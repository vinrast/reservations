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
    Header:
        Content-Type: application/json
    
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
