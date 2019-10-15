# Api para a reserva de salas de reuniões desenvolvidas com Lumen PHP Framework



## Instalação

1.- Clonar o repositório de https://github.com/vinrast/reservations.git  
2.- Instale as dependências necessárias com o comando "Composer Install"  
3.- Configure a conexão do seu banco de dados no seu arquivo ".env"  

## Migrações e dados de teste

O aplicativo possui duas tabelas relacionadas, "Conference_Rooms" 
para armazenar salas de reunião  e "Reservations" para armazenar agendamentos. Para criar essas tabelas e preenchê-las com dados de teste, você pode executar as migrações usando o comando "php artisan migrate --seed".

Como outra opção, o arquivo db.sql é anexado à raiz do projeto para importação

## Endpoints

### Agendamento do dia URL:(GET http://localhost:8000/api/reservations)

Este método permite que você obtenha todos os horários do dia.

Response: 200

    body:
        [
            {
                "id": 1,
                "conference_room_id": 5,
                "email_applicant": "email_1",
                "start_time_date": "2019-10-15 18:38:34",
                "finish_time_date": "2019-10-15 21:38:34",
                "status": "cancelado",
                "description": "description 1"
            },
            {
                "id": 2,
                "conference_room_id": 1,
                "email_applicant": "email_2",
                "start_time_date": "2019-10-15 12:38:34",
                "finish_time_date": "2019-10-15 13:38:34",
                "status": "ativo",
                "description": "description 2"
            },
            {
                "id": 3,
                "conference_room_id": 4,
                "email_applicant": "email_3",
                "start_time_date": "2019-10-15 15:38:34",
                "finish_time_date": "2019-10-15 16:38:34",
                "status": "ativo",
                "description": "description 3"
            }
        ]

### Agendar a sala de reunião. URL:(POST http://localhost:8000/api/reservation/store)

Este método permite criar um novo agendamento. 

Parameters:  

    conference_room_id: int (required) Foreing Key da sala de reuniões,  
    email_applicant: string (required | email) email do usuário solicitante,  
    start_time_date: datetime (required | format(Y-m-d H:i:s) ) data e hora de início da reunião,  
    finish_time_date: datetime (required | format(Y-m-d H:i:s) | maior do que "start_time_date") data e hora de termino da reunião,  
    status: string(required("ativo"/"cancelado")) situação do agendamento,  
    description: (required) description do agendamento  

Response: 200  

    body:
        {
        "message": "reserva criada com sucesso ",
        "reserva": {
            "conference_room_id": 1,
            "email_applicant": "vinrast@gmail.com",
            "start_time_date": "2019-10-16 12:38:34",
            "finish_time_date": "2019-10-16 15:38:34",
            "status": "ativo",
            "description": "dasd",
            "id": 10
        }
        }

Response: 422  

    body:
        {
        "message": "sala de reuniões ocupada",
        "previus": [
                {
                "id": 10,
                "conference_room_id": 1,
                "email_applicant": "vinrast@gmail.com",
                "start_time_date": "2019-10-16 12:38:34",
                "finish_time_date": "2019-10-16 15:38:34",
                "status": "ativo",
                "description": "dasd"
                }
            ]
        }

### Cancelar sala de reunião. URL:(PUT http://localhost:8000/api/reservation/{id})

Este método permite atualizar o campo de status para "cancelar" a reserva  

URL_Parameters:  

    id: int (required) Identificador da agendamento, 

Response 200

    Body:
        {
            "message": "reserva cancelada com sucesso",
            "reserva": {
                "id": 9,
                "conference_room_id": 1,
                "email_applicant": "vinrast@gmail.com",
                "start_time_date": "2019-10-16 12:38:34",
                "finish_time_date": "2019-10-16 15:38:34",
                "status": "cancelado",
                "description": "dasd"
            }
        }

Response: 422

    body:
        {
            "message": "esta reserva já foi cancelada",
            "reserva": {
                "id": 9,
                "conference_room_id": 1,
                "email_applicant": "vinrast@gmail.com",
                "start_time_date": "2019-10-16 12:38:34",
                "finish_time_date": "2019-10-16 15:38:34",
                "status": "cancelado",
                "description": "dasd"
            }
        }

### salas de reunião. URL:(get http://localhost:8000/api/conference_rooms)

Este método permite obter todas as salas de reunião.  


Response: 200

    body:
    [
        {
            "id": 1,
            "name": "eum",
            "capacity": "4"
        },
        {
            "id": 2,
            "name": "nisi",
            "capacity": "6"
        },
        {
            "id": 3,
            "name": "rerum",
            "capacity": "0"
        },
        {
            "id": 4,
            "name": "autem",
            "capacity": "5"
        },
        {
            "id": 5,
            "name": "ut",
            "capacity": "6"
        }
    ]