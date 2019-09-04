FROM node:carbon

WORKDIR /code

ENV NPM_CONFIG_LOGLEVEL info

# Install app dependencies
# A wildcard is used to ensure both package.json AND package-lock.json are copied
# where available (npm@5+)
COPY package*.json ./

RUN npm install
RUN npm install @symfony/webpack-encore --save-dev
# If you are building your code for production
# RUN npm install --only=production

CMD [ "npm", "start" ]