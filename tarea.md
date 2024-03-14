## _Eluter Challenge_
By Aquiles Brito
# Obtener data remota (REMOTE-DATA)

A continuacion se listara el paso a paso para desarrollar el challenge de ELUTER.

- creacion del repo con laravel sail, el cual se subio a GIT, con la siguiente ruta https://github.com/abrito393/eluter-challenge
- Creacion de la migracion para guardar data externa con el comando **./vendor/bin/sail artisan make:migration remote_data** se creo la migracion para crear la tabla **remote_data**
- Creacion el model con el comando **./vendor/bin/sail artisan make:model RemotaData** para crear la representacion de la tabla en base de datos y poder interactuar con ella
- Creacion de comando para colocar como una tarea programada con el comando **./vendor/bin/sail artisan make:command GetRemoteData





## Guardar data de callback (REMOTE-ACTIONS)
_Url:https://laravel.tt.eluter.com/api/action_

- Creacion de migracion para la tabla remote-actions
- Creacion de la carpeta **webhooks** dentro de controllers para tener un orden mejor y que tenga una unica resposabilidad

Instrucciones para que funcione correctamente:

- Abrir un tunnel con cloudflared tunnel --url http://localhost:80, previamente tener instalado la libreria de cloudflared en tu pc, esto te generar una URL parecida a esta **https://stock-occasions-tutorial-indicates.trycloudflare.com**
- Al generar la url en el archivo .env sustituir el valor de la variable URL_CALLBACK=https://stock-occasions-tutorial-indicates.trycloudflare.com
- una vez sustituida podras hacer POST **https://stock-occasions-tutorial-indicates.trycloudflare.com/api/push/eluter/actions/{String-cualquiera}** y esto hara un callback al API **{url}/webhooks/eluter** con la data que envia el callback y esto se guardara en la tabla remote-actions
