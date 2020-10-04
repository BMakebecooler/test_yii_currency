#!/usr/bin/env bash

php ./yii gii/model \
    --tableName=* \
    --overwrite=1 \
    --color=1 \
    --interactive=0 \
    --template=default \
    --ns=common\\\models\\\generated\\models \
    --queryNs=common\\\models\\\generated\\query \
    --baseClass=common\\\ActiveRecord \
    --queryBaseClass=common\\\ActiveQuery \
    --generateQuery=1 \
    --enableI18N=0 \
    --messageCategory=common