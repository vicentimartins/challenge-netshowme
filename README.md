# netshow.me challenge

Challenge propose by netshow.me for PHP/Laravel back-end developers.

## Objective

Create a message service that consume a costumer message.

## Requirements

- [ ] Data sent must be registered in a database
- [ ] In addition to the data sent by the user, the information must contain IP and Datetime when message was sent
- [ ] All fields are required
- [ ] email and phone number must be valid
- [ ] The file must not be larger than 500 kb
- [ ] The file extensions must be pdf, doc, docx, odt, or txt
- [ ] The attachment must be stored on disk and only its path must be stored in the database
- [ ] A message must be sent to a confirmation e-mail address. This e-mail must be defined in a configuration file

## How to section

### How to up dev environment

> This project assumes that you have installed and configured *docker* and *docker-compose* in your localhost.

1. Clone the project from GitHub:

```bash
git clone git@github.com:vicentimartins/desafio-netshow.git
```

2. Access the project path and create the container where the app will run

```bash
 docker-composer up -d --build --remove-orphans
```
3. Access the created container and run composer:

```bash
 docker-composer exec php bash
```

Inside php container, then run:

```bash
 composer install -o
```

4. Access the url `http://localhost` to view existent messages or send a new.

> Please, validate that the port 80 from your localhost stay free. Instead, change to an appropriate free port which
> NGINX could run well.
