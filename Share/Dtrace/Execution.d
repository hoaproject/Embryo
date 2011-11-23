#!/usr/bin/env dtrace -s

#pragma D option quiet
#pragma D option switchrate=10

BEGIN
{
    printf("[38;5;0;48;5;226mTrace start [%Y][0m\n", walltimestamp);
    self->depth      = 0;
    self->time_last  = 0;
}

php*:::function-entry
/copyinstr(arg0) == ""/
{
    printf(
        "[38;5;143m%dms\t[38;5;94m-> [38;5;106m{main}[38;5;94m()\t\t\t[38;5;240m%s/[38;5;143m%s[38;5;240m:[38;5;143m%d[0m\n",
        0,
        dirname(copyinstr(arg1)),
        basename(copyinstr(arg1)),
        arg2
    );

    self->time_last = timestamp;
}

php*:::function-entry
/copyinstr(arg0) != ""/
{
    self->depth += 2;

    printf(
        "[38;5;143m%dms\t[38;5;94m%*s [38;5;74m%s[38;5;220m%s[38;5;106m%s[38;5;94m()\t\t\t[38;5;240m%s/[38;5;143m%s[38;5;240m:[38;5;143m%d[0m\n",
        (timestamp - self->time_last) / 1000,
        self->depth, "->",
        copyinstr(arg3),
        copyinstr(arg4),
        copyinstr(arg0),
        dirname(copyinstr(arg1)),
        basename(copyinstr(arg1)),
        arg2
    );

    self->time_last = timestamp;
}

php*:::function-return
/copyinstr(arg0) != ""/
{
    self->depth -= 2;
}

END
{
    self->depth = 0;
    printf("[38;5;0;48;5;226mTrace end [%Y][0m\n", walltimestamp);
}