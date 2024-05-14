# Documentazione

## Versione WEB

L'utilizzo della versione WEB è molto semplice: basta selezionare la tipologia di ricerca (per data o per nome) ed
effettuare la ricerca

## API

Molto più interessante è la possibilità di richiamare il servizio via API.

Per fare questo è necessario registrarsi e confermare la propria mail.
**La registrazione è assolutamente gratuita e l'indirizzo email non verrà MAI ceduto a nessuno.**

Tutte le chiamate alle API devono essere autenticate usando un Beaer token ottenuto nella propria area personale, alla
voce **Profilo**, oppure chiamando l'API login

```bash
curl --location 'https://santodelgiorno.mintdev.me/api/login' \
--form 'email="user@example.com"' \
--form 'password="password"'
```

<img src="/storage/immagini/screen1.png">

### Elenco Santi

Elenco paginato tutti i santi inseriti

```
GET https://santodelgiorno.mintdev.me/api/v1/santo
Accept: application/json
Authorization: Bearer <token>
```

### Informazione su singolo santo

```
GET https://santodelgiorno.mintdev.me/api/v1/santo/<uuid>
Accept: application/json
Authorization: Bearer <token>
```
Per avere il dettaglio della fonte:

```
GET https://santodelgiorno.mintdev.me/api/v1/santo/<uuid>?include=fonte
Accept: application/json
Authorization: Bearer <token>
```

### Ricerca

#### Ricerca per data

```
GET https://santodelgiorno.mintdev.me/api/v1/santo/data/{mese}/{giorno}
Accept: application/json
Authorization: Bearer <token>
```

- mese: numero intero tra 1 e 12
- giorno: numero intero tra 1 e 31

#### Ricerca per nome

```
GET https://santodelgiorno.mintdev.me/api/v1/santo/nome/{nome}
Accept: application/json
Authorization: Bearer <token>
```
La ricerca avviene in modo case-insensitive e in LIKE
