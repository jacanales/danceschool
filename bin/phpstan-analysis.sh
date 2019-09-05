#! /bin/bash

BUILD_FOLDER=/tmp/build/phpstan
RESULT_FILE=${BUILD_FOLDER}/phpstan.result
CACHE_FILE=${BUILD_FOLDER}/phpstan.result.cache

mkdir -p ${BUILD_FOLDER}

make phpstan-result

if [[ ! -r ${CACHE_FILE} ]]
then
    echo "There is no PHPStan cache file"
    cp "${RESULT_FILE}" ${CACHE_FILE}
    echo "Created PHPStan cache"

    exit 0
fi

echo "There is PHPStan cache"

ln_cache="$(wc -l < ${CACHE_FILE})"
ln_current="$(wc -l < "${RESULT_FILE}")"

if [[ "$ln_cache" -lt "$ln_current" ]]
then
    echo "There are more lines in the new PHPStan result"
    echo
    diff ${CACHE_FILE} "${RESULT_FILE}"
    echo

    if [[ "$TRAVIS_PULL_REQUEST" = "false" ]]
    then
        echo "This is master, so the PHPStan cache has to be updated"
        cp "${RESULT_FILE}" ${CACHE_FILE}
        echo "Updated PHPStan cache"
    fi
    echo "PHPStan errors have increased"
    exit 1
elif [[ "$ln_cache" -gt "$ln_current" ]]
then
    echo "PHPStan errors have been reduced"
elif [[ "$ln_cache" -eq "$ln_current" ]]
then
    echo "PHPStan errors remain equal"
fi