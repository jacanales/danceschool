#! /usr/bin/env bash

images=(redis socialpoint/ubuntu14.04-app)

if [ "$1" == "load" ]
then
    for image_raw_name in ${images[*]}
    do
        image_name=$(echo ${image_raw_name} | sed 's/\//_/g')
        if [[ -e ~/docker/${image_name}.tar ]]
        then
            echo "loading image ${image_raw_name} from cache"
            docker load -i ~/docker/${image_name}.tar
        fi
    done
elif [ "$1" == "save" ]
then
    mkdir -p ~/docker

    for image_raw_name in ${images[*]}
    do
        image_name=$(echo ${image_raw_name} | sed 's/\//_/g')
        if [[ ! -e ~/docker/${image_name}.hash ]]
        then
            current_hash=$(docker images ${image_raw_name}| head -n2 | tail -n1 | awk '{print $3}')
            echo "" > ~/docker/${image_name}.hash
        else
            saved_hash=$(cat ~/docker/${image_name}.hash)
            current_hash=$(docker images ${image_raw_name} | grep -v REPOSITORY | grep -v ${saved_hash} | awk '{print $3}' | head -n1)
        fi

        saved_hash=$(cat ~/docker/${image_name}.hash)
        if [ "${current_hash}" != "" ] && [ "${saved_hash}" != "${current_hash}" ]
        then
            echo "saving image ${image_raw_name} into cache"
            docker save ${current_hash} > ~/docker/${image_name}.tar
            echo ${current_hash} > ~/docker/${image_name}.hash
        fi
    done
fi