#!/bin/sh

cd /var/www/vhost/cms
# npm
export NODE_ENV=development
npm install && npm run watch
