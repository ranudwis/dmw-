FROM node:12.16.1-alpine3.11

WORKDIR /frontend

COPY package.json yarn.lock ./
RUN yarn install

COPY . .

CMD ["yarn", "localbuild"]
