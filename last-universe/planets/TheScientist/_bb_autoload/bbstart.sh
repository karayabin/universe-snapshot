#!/bin/bash


#----------------------------------------
# Bumble Bee Autoloader Setup Script -- 2015-10-20 -- LingTalfi 
#----------------------------------------
#
# This script performs the _bb_autoload setup in your application.
# 
#
# Algorithm
# ----------------
# 
# The algorithm is as following:
#  
# (assuming you have cd into your app main directory) 
# - if there is already a _bb_autoload dir, do nothing: we don't want to accidently overwrte
#     the changes you have made to this directory, although I would recommend to not alter the _bb_autoload
#     directory at all.
#     
# - then it tries to import the _bb_autoload, first from your machine from your home directory: ~/_bb_autoload,
#     and if not found, from the internet.           
# 
# - when importing, it creates automatically the ~/_bb_autoload for you if it's not there already, so that the next
#     time you call this script it doesn't need an internet connection. 
#
# 
# _bb_autoload directory
# ------------------------------
# 
# This script will create the following structure in the directory you are currently in:
# 
# - _bb_autoload/
# ----- autoload.php
# ----- BeeAutoloader.php
# ----- ButineurAutoloader.php
# - modules/
# 
# Once this structure is created, you have to manually include _bb_autoload/autoload.php from your 
# application init file, then you can use any BSR-0 class that you put in the modules directory.
# 
# More info about BSR-0 here: https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md
# 
# Enjoy!
# 




#----------------------------------------
# CONFIG 
#----------------------------------------
_programName='bbstart'
dir='_bb_autoload'
localDir="${HOME}/$dir"
verbose=0  


#----------------------------------------
# FUNCTIONS
#----------------------------------------
error (){
    echo -n "$_programName: "
    echo "$1" >&2
    if [ -n "$2" ]; then
        help
    fi
    exit 1
} 

help (){
    echo "Usage: $_programName [-v]*"
} 


log(){
    if [ "$verbose" -ge 1 ]; then
        echo -e "\e[34m$_programName(v):\e[0m $1"
    fi
}

logg(){
    if [ "$verbose" -ge 2 ]; then
        echo -e "\e[34m$_programName(vv):\e[0m $1"
    fi
}


#----------------------------------------
# SCRIPT
#----------------------------------------
while getopts :d:v opt; do
    case "$opt" in
        d) myvar="$OPTARG" ;;
        v) (( verbose++ )) ;;
    esac
done





if ! [ -d "$dir" ]; then
    logg "$dir not found in your current directory, trying from your local machine ($localDir)"
    
    if [ -d "$localDir" ]; then
        logg "Copying dir from your local machine ($localDir)"
        cp -R "$localDir" "$dir" 
    else
        logg "Not found in your local machine ($localDir), trying from the internet"
        
        if [ "$verbose" -ge 3 ]; then
            wget -P "$dir" https://raw.githubusercontent.com/lingtalfi/BumbleBee/master/Autoload/BeeAutoloader.php \
                https://raw.githubusercontent.com/lingtalfi/BumbleBee/master/Autoload/ButineurAutoloader.php \
                https://raw.githubusercontent.com/lingtalfi/TheScientist/master/_bb_autoload/autoload.php
        else
            wget -P "$dir" https://raw.githubusercontent.com/lingtalfi/BumbleBee/master/Autoload/BeeAutoloader.php \
                https://raw.githubusercontent.com/lingtalfi/BumbleBee/master/Autoload/ButineurAutoloader.php \
                https://raw.githubusercontent.com/lingtalfi/TheScientist/master/_bb_autoload/autoload.php > /dev/null 2>&1         
        fi
           
        logg "Tyring to copy the $dir to your local machine for next time"
        cp -R "$dir" "$localDir"                    
                    
    fi
else
    log "$dir found in your current directory: doing nothing"
fi


if ! [ -d "modules" ]; then
    logg "creating modules dir"
    mkdir "modules"
fi

log "-------------------------"
log "_bb_autoload: I am ready."
log "-------------------------"
log "Add the following lines in your application init:"
log 
log "require_once \"_bb_autoload/autoload.php\";"
log 









