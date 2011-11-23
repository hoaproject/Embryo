#!/usr/bin/env dtrace -s

#pragma D option quiet
#pragma D option switchrate=10
#pragma D option aggsortrev

struct call_s {
    uint64_t time;
    size_t   depth;
    string   name;
};
struct call_s calls[uint64_t];

uint64_t execute_start;
uint64_t execute_stop;

BEGIN
{
    self->i = 0;
}

php*:::execute-entry
{
    execute_start = timestamp;
}

php*:::function-entry
/copyinstr(arg0) != ""/
{
    calls[self->i].name  = strjoin(
        copyinstr(arg3),
        strjoin(copyinstr(arg4), copyinstr(arg0))
    );
    calls[self->i].time  = timestamp;
    calls[self->i].depth = self->i;

    self->i++;
}

php*:::function-return
/copyinstr(arg0) != ""/
{
    self->i--;

    @c[calls[self->i].name] = count();
    @a[calls[self->i].name] = quantize(
        (timestamp - calls[self->i].time) / 1000
    );
}

php*:::execute-return
{
    execute_stop = timestamp;
}

END
{
    printf("Count calls:\n");
    printa("  • %-80s%@u\n", @c);

    printf("\nExecution distribution (values are in nanoseconds):\n");
    printa(@a);

    printf("Total execution time: %dms", (execute_stop - execute_start) / 1000);
}