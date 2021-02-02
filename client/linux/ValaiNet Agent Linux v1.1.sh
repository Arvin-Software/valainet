#!/bin/bash
echo "########################################################################"
echo "#                  ValaiNet compatible Linux client                    #"
echo "#                            v1.1 Build 100                            #"
echo "#                  Bash client Program for VALAI NET                   #"
echo "#           using curl, pgrep, grep, sed, getconf, python3 etc         #"
echo '# this client uses opendns.com. if you want any other please configure #'
echo "#            (C) 2020 Valainet Project. All Rights Reserved            #"
echo "########################################################################"
echo "Starting all modules..."
#Parameters for the API Post function
ip="192.168.5.128"
group="work computer"
apikey="61170bva084bb0vaf3185avaf34d20vae35dcc"
apiip=http://192.168.1.8/valainet/api.php
#uploading computer info... animation
for pc in $(seq 1 100); do
    echo -ne "Uploading Computer Info... $pc%\033[0K\r"
    sleep 0.01
done
#get computer name
host_names=$(hostname)
#get os information
os=$(lsb_release -ds)
#processor information
proc=$(lscpu | grep "Model name:" | sed -r 's/Model name:\s{1,}//g')
#memory information
mem=$(($(getconf _PHYS_PAGES) * $(getconf PAGE_SIZE) / (1024 * 1024)))
#display resolution
resol=$(xdpyinfo | awk '/dimensions/{print $2}')
#upload all the information
curl --silent --output /dev/null --data "act=insertinfo&asset=LINUX002&ip=$ip&group=$group&apikey=$apikey&nm=$host_names&os=$os&proc=$proc&ram=$mem MiB&dis=$resol&stat=success" $apiip;
#upload done message
echo -e "Uploading Computer info... \e[1m\e[92mdone"
#wait for 1 second
sleep 1
#uploading os info...animation
for pc in $(seq 1 100); do
    echo -ne -e "\e[39m\e[0mUploading OS Info... $pc%\033[0K\r"
    sleep 0.01
done
#uptime information
uptime=$(uptime -s)
#os bitness
bitness=$(uname -i)
#kernal name
kernal=$(uname -r)
#ip information
extip=$(dig +short myip.opendns.com @resolver1.opendns.com)
#upload os info
curl --silent --output /dev/null --data "act=insertos&bit=$bitness&serial=Free&installed=$kernal&uptime=$uptime&booted=$uptime&extip=$extip&ip=$ip&group=$group&apikey=$apikey" $apiip;
#uploading done message
echo -e "Uploading OS info... \e[1m\e[92mdone"
#sleep for 1 second
sleep 1
#Module started message
echo -e "\e[92m\e[1mAll Modules started"
#sleep for 1 second
sleep 1
#live monitor starting animation
for pc in $(seq 1 100); do
    echo -ne -e "\e[39m\e[0mLive Monitor module... $pc%\033[0K\r"
    sleep 0.01
done
#sleep for 1 second
sleep 1
#live monitor started message
echo  -e "\e[39m\e[0mLive Monitor module... \e[1m\e[92mstarted"
#sleep for 1 second
sleep 1
#messages
#live monitor starting animation
for pc in $(seq 1 100); do
    echo -ne -e "\e[39m\e[0mProcess monitor... $pc%\033[0K\r"
    sleep 0.01
done
#sleep for 1 second
sleep 1
echo  -e "\e[39m\e[0mProcess monitor... \e[1m\e[92mstarted"
sleep 1
echo -e "\e[92m\e[1mConnected to server and monitoring..."
echo -e "\e[91m\e[1m(Important : Please Don't Close this window)"
#indefinate loop
while sleep 2; 
do 
    #response to get json from website
    response=$(curl --silent --data "act=retjson&ip=$ip&group=$group&apikey=$apikey" $apiip)
    #write json to file
    echo $response > worker.json
    #extract count value from json
    dict_value=$(python3 -c 'import json, os; d=json.loads(open("worker.json").read()); print(d["count"])')
    #echo $dict_value

    

    #for loop to get process name from json file
    i="0"
    while [ $i -lt $dict_value ]
    do
        #extract mm value one by one on loop
        proc=$(python3 -c "import json, os; d=json.loads(open('worker.json').read()); print(d['mm' + str($i)])")
        #check if process is running
        fire=$(pgrep -f $proc)
        #if else statement to determine the process is running or not
        if [ -z "$fire" ]
        then
	     #echo -e "\e[39m\e[0m$i : $proc - No process in the name mentioned found $fire"
    #        echo 'does not exist'
            #failure
            curl --silent --output /dev/null --data "act=updateprocstat&nm=$proc&stat=failure&ip=$ip&group=$group&apikey=$apikey" $apiip;
        else
            #echo -e "\e[39m\e[0m$i : $proc - Process in the name mentioned found $fire"
    #        echo 'does exist'
            #success
            curl --silent --output /dev/null --data "act=updateprocstat&nm=$proc&stat=success&ip=$ip&group=$group&apikey=$apikey" $apiip;
        fi
        i=$[$i+1]
    done
    



    #response from getjson ip from website
    response=$(curl --silent --data "act=retjsonip&ip=$ip&group=$group&apikey=$apikey" $apiip)
    #writejson to file
    echo $response > worker1.json
    #extract count value from json
    dict_value1=$(python3 -c 'import json, os; d=json.loads(open("worker1.json").read()); print(d["count"])')
#    echo $dict_value1
    #updateipstat
    i="0"
    while [ $i -lt $dict_value1 ]
    do
        echo $i
        ip_addr=$(python3 -c "import json, os; d=json.loads(open('worker1.json').read()); print(d['mm' + str($i)])")
        #check if the ip is able to be pinged
        ping -c1 $ip_addr
        if [ $? -eq 0 ]
        then 
#            echo 'true'
            curl --silent --output /dev/null --data "act=updateipstat&nm=$ip_addr&stat=success&ip=$ip&group=$group&apikey=$apikey" $apiip;            
            ((i=i+1))
            echo $i
            continue
        else
#            echo 'false'
            curl --silent --output /dev/null --data "act=updateipstat&nm=$ip_addr&stat=failure&ip=$ip&group=$group&apikey=$apikey" $apiip;
            ((i=i+1))
            continue
        fi
       
    done



    #insert system status whether it is online or not
    curl --silent --output /dev/null --data "act=insertstat&ip=$ip&group=$group&apikey=$apikey&nm=aravindhlinux&stat=success" $apiip; 
done
