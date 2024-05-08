# Documentazione

## API

Elenco paginato tutti i santi inseriti

```
GET /api/v1/santo
```

GET /api/santo/{id} torna un singolo santo dato l'ID
GET /api/santo/nome/{nome} torna il o i santi con nome in %LIKE%
GET /api/santo/data/{mese}/{giorno} torna il santo del mese specificato
