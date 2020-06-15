<b>Pre-requisite's: </b>
<ul>
    <li>Docker</li>
    <li>Node</li>
    <li>Riot API key</li>
</ul>

<b>Setup:</b>

<p>
<b>Make sure Docker and Node are installed locally on your machine.

If you do not have an API key, you can use a free API key on the Riot Developer Portal.</b>

<b>1)</b> Pull down the branch and access project root via terminal.

<b>2)</b> Once in project root build the docker container: 

```docker-compose up --build```

this will build and bring up the docker containers.

<b>3)</b> Once container has built in another terminal in the same project root, bash into the docker container by running this command:

```docker-compose exec app bash```

This means that any of the following commands you run, will be run inside the container and not in your local environment.

<b>4)</b> inside of the container, run: 

```composer install```

<b>5)</b> make sure you have connected to the mySQL database using the database creds in the docker-compose.yml file. Then inside of the container, run:

```php artisan migrate```

<b>6)</b> Outside of the container, in your local project root, run:

```npm install```

then:

```npm run dev```

<b>7)</b> in your browser navigate to: http://localhost:8086/
</p>
