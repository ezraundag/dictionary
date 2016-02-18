# Dictionary
Given a list of words (see the included 'words.txt' list), generate two output files, 'uniques' and 'fullwords'. The 'uniques' output file should contain every sequence of four letters that appears in exactly one word of the dictionary, with one sequence of four letters per line, alphabetized. The 'fullwords' file should contain the corresponding full, original words that contain the sequences in the 'uniques' file, in the same order, again one per line.

Script should finish running in under 2 seconds.

An example:

Say this is your dictionary:
bicycle
book
for
recycle


'uniques' would contain:
bicy
book
ecyc
icyc
recy


and 'fullwords' would have:
bicycle
book
recycle
bicycle
recycle


'cycl' and 'ycle' wouldn't show up in 'uniques', because they each appear in more than one word.
