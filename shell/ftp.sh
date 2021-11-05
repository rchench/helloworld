#!/bin/bash
HOST='ftp.domain.com'
USER='ftp'
PASSWD='ftp'
FILE='file.txt'

ftp -n $HOST <<END_SCRIPT
quote USER $USER
quote PASS $PASSWD
binary
put $FILE
quit
END_SCRIPT
exit 0
