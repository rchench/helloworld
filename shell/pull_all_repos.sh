#!/bin/bash
# pull git local repos from remote, it finds all git repos in given dirs
# main purpose is to backup, as well as daily merge from remote
# <cmd>
# <cmd> <repo_to_find_in_dir1> <repo_to_find_in_dir2> ...
# <cmd> <repo_list_in_a_file>
# if no parameter is given, use user's home directory

DIRS="$@"
if [ "$DIRS" == "" ]
then
	DIRS=`echo ~`
fi

if [[ -f "$DIRS" ]]
then
	input=`cat $DIRS`
else
	input=`find $DIRS -name .git | sed "s/\.git//g"`
fi

for repo in $input
do
	echo "$repo"
	cd $repo
	git pull --rebase
done
