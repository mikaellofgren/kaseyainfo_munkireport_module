#!/bin/sh
# Get Kaseya username

# Skip manual check
if [ "$1" = 'manualcheck' ]; then
	echo 'Manual check: skipping'
	exit 0
fi
#  Check for Kaseya ini files
if [ -e /Library/Preferences/kaseyad.ini ]; then
echo "Kaseya exist, lets get username"
    else 
    echo "Kaseya doesnt exists"
    exit 0
fi

# Create cache dir if it doesnt exist
DIR=$(dirname $0)
mkdir -p "$DIR/cache"

# Get Kaseya username
username=`grep "User_Name" /Library/Preferences/kaseyad.ini | /usr/bin/awk '{ print $2 }'`

echo "username =" "$username" >"$DIR/cache/kaseyainfo.txt"

exit 0
