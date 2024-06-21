FROM node:20-bullseye
RUN apt install -y make gcc g++
WORKDIR /www
EXPOSE 8887

# install package JSON dependencies
COPY ./package-lock.json package-lock.json
COPY ./package.json package.json

# copy project files
COPY . .

RUN npm install
RUN npm install -g nodemon
CMD ["npm", "start"]
