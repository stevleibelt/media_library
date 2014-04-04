#!/bin/sh
####
# @author stev leibelt <artodeto@bazzline.net>
# @since 2014-03-27
####

# god save my lazines
WORKING_DIRECTORY=`pwd`
SCRIPT_PATH=$(cd $(dirname "$0"); pwd)

cd $SCRIPT_PATH/data/propel
sh "$SCRIPT_PATH/vendor/bin/propel-gen"
exit 0
