#!/bin/bash


NODE_VERSION="v20.11.0"
NVM_DIR="/usr/local/nvm"
PATH=${NVM_DIR}/versions/node/${NODE_VERSION}/bin:${PATH}

mkdir -p $NVM_DIR
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash

source /root/.bashrc
nvm install $NODE_VERSION
nvm use --delete-prefix $NODE_VERSION
