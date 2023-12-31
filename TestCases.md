1. **Идентификатор:** 1
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка GET-запроса для получения полных данных о сотруднике по существующему id (успешный ответ 200)
4. **Связанное с тест-кейсом требование:** `/api/v1/employee/{id}` должен поддерживать метод GET и быть предназначен для
   получения данных о сотруднике.
5. **Модуль и подмодуль приложения:** API для управления сотрудниками.
6. **Исходные данные, необходимые для выполнения тест-кейса:**
    - База данных, где хранятся данные о сотрудниках
    - Существующий сотрудник в системе с уникальным идентификатором (id).
7. **Шаги тест-кейса:**
    1. Зайти в консоль ввести команду php vendor/bin/codecept run tests/GetNewEmployeCest.php: --steps
    2. Найти в консоли строку Test: tests/GetNewEmployeCest.php:getEmployeById
    3. Посмотреть код ответа
8. **Ожидаемые результаты:**
    - Сервер должен успешно обработать GET-запрос.
    - Если сотрудник с указанным `id` существует:
        - HTTP-статус ответа должен быть 200 (Успешный ответ).
        - В теле ответа должна быть получена полная информация.


1. **Идентификатор:** 2
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка GET-запроса с несуществующим id сотрудника
4. **Связанное с тест-кейсом требование:** `/api/v1/employee/{id}` должен поддерживать метод GET и быть предназначен для
   получения данных
5. **Модуль и подмодуль приложения:** API для управления сотрудниками.
6. **Исходные данные, необходимые для выполнения тест-кейса:**
    - База данных, где хранятся данные о сотрудниках
7. **Шаги тест-кейса:**
    1. Зайти в консоль ввести команду php vendor/bin/codecept run tests/GetNewEmployeCest.php:GetNonExistentEmployee
       --steps
    2. Проверьте статус ответа от сервера.
8. **Ожидаемые результаты:**
    - GET-запрос к `/api/v1/employee/{id}` с несуществующим id сотрудника должен вернуть статус 404 Not Found.


1. **Идентификатор:** 3
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка метода POST для успешного добавления нового сотрудника статус (201 Created)
4. **Связанное с тест-кейсом требование:**  /api/v1/employee/add должен поддерживать метод POST и быть
   предназначен для добавления информации о новом сотруднике.
5. **Модуль и подмодуль приложения:** API для добавления сотрудниками.
6. **Исходные данные, необходимые для выполнения тест-кейса:**
    - База данных куда будут сохраняться новый сотрудник
    - Должны быть валидные данные(name,email,position,age) в методе createEmploye
7. **Шаги тест-кейса:**
    1. Зайти в консоль ввести команду php vendor/bin/codecept run tests/CreateNewEmployeCest.php:createEmploye --steps
    2. Проверьте статус ответа от сервера в строке tests/CreateNewEmployeCest.php:createEmploye.
8. **Ожидаемые результаты:**
    - Ожидается успешный статус (201 Created), указывающий на успешное добавление
      новой записи.


1. **Идентификатор:** 4
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка типа данных поля "name" должна быть string проверяется тип данных(null,int,bool)
4. **Связанное с тест-кейсом требование:** Поле name не должно быть пустым
5. **Модуль и подмодуль приложения:** Добавление сотрудника в поле name
6. **Исходные данные, необходимые для выполнения тест-кейса:** Ожидаемые HTTP-статусы ответов сервера при успешной и при
   наличии ошибок.
7. **Шаги тест-кейса:**
    1. Зайти в консоль ввести команду vendor/bin/codecept run tests/CreateNewEmployeCest.php:
       createGameEmployeIncorrectData -vv
    2. В консоли найти, проверки 'name', где проверяется тип данных(null,int,bool)
8. **Ожидаемые результаты:**
    - Поле "name" должно принимать только строковые значения (тип "string").код ответа(400)


1. **Идентификатор:** 5
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка "name" не может быть пустым
4. **Связанное с тест-кейсом требование:** Проверка типа данных поля "name" должна быть string
5. **Модуль и подмодуль приложения:** Добавление сотрудника в поле name
6. **Исходные данные, необходимые для выполнения тест-кейса:**
   Ожидаемые HTTP-статусы ответов сервера при успешной и при наличии ошибок.
7. **Шаги тест-кейса:**
    1. Зайти в консоль ввести команду vendor/bin/codecept run tests/CreateNewEmployeCest.php:
       createGameEmployeIncorrectData -vv
    2. В консоли найти, проверки 'name', на пустую строку
8. **Ожидаемые результаты:**
    - Поле "name" оставлено пустым, ожидается сообщение об ошибке. код ответа(400)


1. **Идентификатор:** 6
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка обязательного поля "email"
4. **Связанное с тест-кейсом требование:** Поле "email" должно быть уникальным
5. **Модуль и подмодуль приложения:** Добавление сотрудника в поле email
6. **Исходные данные, необходимые для выполнения тест-кейса:**
   Ожидаемые HTTP-статусы ответов сервера при успешной и при наличии ошибок.
7. **Шаги тест-кейса:**
    1. Зайти в консоль ввести команду php vendor/bin/codecept run tests/CreateNewEmployeCest.php:EmailFieldIsRequired
       --steps
    2. В консоли найти, код ответа данного теста
8. **Ожидаемые результаты:**
    - Если поле "email" оставлено пустым, ожидается сообщение об ошибке, код ответа (400)


1. **Идентификатор:** 7
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка на уникальность поля "email"
4. **Связанное с тест-кейсом требование:** Поле "Почта" должно быть обязательным для заполнения.
   Проверка соответствия поля "email" маске
5. **Модуль и подмодуль приложения:** Форма регистрации или входа.
6. **Исходные данные, необходимые для выполнения тест-кейса:**
   Ожидаемые HTTP-статусы ответов сервера при успешной и при наличии ошибок.
7. **Шаги тест-кейса:**
    1. Зайти в консоль ввести команду php vendor/bin/codecept run tests/CreateNewEmployeCest.php:EmailFieldIsUnique
       --steps
    2. В консоли найти, код ответа данного теста
8. **Ожидаемые результаты:**
    - Поле "email" должно быть уникальным, и при попытке использовать уже существующий адрес электронной почты должно
      отображаться сообщение об ошибке, код ответа (400).


1. **Идентификатор:** 8
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка соответствия поля "email" маске
4. **Связанное с тест-кейсом требование:** Поле "Почта" должно быть обязательным для заполнения.
5. **Модуль и подмодуль приложения:** Форма регистрации или входа.
6. **Исходные данные, необходимые для выполнения тест-кейса:**
   Ожидаемые HTTP-статусы ответов сервера при успешной и при наличии ошибок.
7. **Шаги тест-кейса:**
    1. Зайти в консоль ввести команду php vendor/bin/codecept run tests/CreateNewEmployeCest.php:InvalidEmailFormat
       --steps
    2. В консоли найти, код ответа данного теста
8. **Ожидаемые результаты:**
    - Поле "email" должно соответствовать маске "имя_пользователя@имя_сервера.домен", где "@" и "." являются
      обязательными символами, код ответа (400).


1. **Идентификатор:** 9
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка типа данных поля "position" должна быть string
4. **Связанное с тест-кейсом требование:** Поле position не должно быть пустым
5. **Модуль и подмодуль приложения:** Добавление сотрудника в поле position
6. **Исходные данные, необходимые для выполнения тест-кейса:** Ожидаемые HTTP-статусы ответов сервера при успешной и при
   наличии ошибок.
7. **Шаги тест-кейса:**
   1. Зайти в консоль ввести команду vendor/bin/codecept run tests/CreateNewEmployeCest.php:
      createGameEmployeIncorrectData -vv
   2. В консоли найти, проверки 'position', где проверяется тип данных(null,int,bool)
8. **Ожидаемые результаты:**
   - Поле "position" должно принимать только строковые значения (тип "string").код ответа(400)


1. **Идентификатор:** 10
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка "position" не может быть пустым
4. **Связанное с тест-кейсом требование:** Проверка типа данных поля "position" должна быть string
5. **Модуль и подмодуль приложения:** Добавление сотрудника в поле name
6. **Исходные данные, необходимые для выполнения тест-кейса:**
   Ожидаемые HTTP-статусы ответов сервера при успешной и при наличии ошибок.
7. **Шаги тест-кейса:**
   1. Зайти в консоль ввести команду vendor/bin/codecept run tests/CreateNewEmployeCest.php:
      createGameEmployeIncorrectData -vv
   2. В консоли найти, проверки 'position', на пустую строку
8. **Ожидаемые результаты:**
   - Поле "position" оставлено пустым, ожидается сообщение об ошибке. код ответа(400)


1. **Идентификатор:** 12
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка типа данных поля "age" должна быть string
4. **Связанное с тест-кейсом требование:** Поле age не должно быть пустым
5. **Модуль и подмодуль приложения:** Добавление сотрудника в поле age
6. **Исходные данные, необходимые для выполнения тест-кейса:** Ожидаемые HTTP-статусы ответов сервера при успешной и при
   наличии ошибок.
7. **Шаги тест-кейса:**
   1. Зайти в консоль ввести команду vendor/bin/codecept run tests/CreateNewEmployeCest.php:
      createGameEmployeIncorrectData -vv
   2. В консоли найти, проверки 'age', где проверяется тип данных(null,int,bool)
8. **Ожидаемые результаты:**
   - Поле "age" должно принимать только строковые значения (тип "string").код ответа(400)


1. **Идентификатор:** 13
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка "age" не может быть пустым
4. **Связанное с тест-кейсом требование:** Проверка типа данных поля "age" должна быть string
5. **Модуль и подмодуль приложения:** Добавление сотрудника в поле age
6. **Исходные данные, необходимые для выполнения тест-кейса:**
   Ожидаемые HTTP-статусы ответов сервера при успешной и при наличии ошибок.
7. **Шаги тест-кейса:**
   1. Зайти в консоль ввести команду vendor/bin/codecept run tests/CreateNewEmployeCest.php:
      createGameEmployeIncorrectData -vv
   2. В консоли найти, проверки 'age', на пустую строку
8. **Ожидаемые результаты:**
   - Поле "age" оставлено пустым, ожидается сообщение об ошибке. код ответа(400)


1. **Идентификатор:** 13
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка метода DELETE для удаления сотрудника
4. **Связанное с тест-кейсом требование:** Еnd-point /api/v1/employee/remove/{id} должен поддерживать метод DELETE и
   быть предназначен для удаления информации об уволившемся сотруднике по уникальному идентификатору (id).
5. **Модуль и подмодуль приложения:** API для управления сотрудниками.
6. **Исходные данные, необходимые для выполнения тест-кейса:**
    - База данных, где хранятся данные о сотрудниках
    - Уволенный сотрудник с уникальным идентификатором (id).

7. **Шаги тест-кейса:**
     1. Зайти в консоль ввести команду vendor/bin/codecept run tests/DeleteNewEmployeCest.php:deleteEmployeById --steps
     2. В этом тесте сначала удаляем потом проверяем удалился ли сотрудник
	 3. Проверить код ответа в консоли 
8. **Ожидаемые результаты:**
    - Метод DELETE для  /api/v1/employee/remove/{id} должен успешно удалять запись об уволенном сотруднике по
      уникальному идентификатору (id). код ответа (404)


1. **Идентификатор:** 14
2. **Приоритет:** Высокий
3. **Заглавие:** Проверка DELETE-запроса с несуществующим id сотрудника
4. **Связанное с тест-кейсом требование:** `/api/v1/employee/remove/{id}` должен поддерживать метод DELETE
5. **Модуль и подмодуль приложения:** API для управления сотрудниками.
6. **Исходные данные, необходимые для выполнения тест-кейса:** Несуществующий id сотрудника, который не соответствует ни
   одной записи.
7. **Шаги тест-кейса:**
    1. Зайти в консоль ввести команду Employeevendor/bin/codecept run tests/DeleteNewEmployeCest.php:DeleteNonExistent --steps
    2. Проверьте статус ответа от сервера, указывающий на несуществующим id сотрудника.
8. **Ожидаемые результаты:** 
    - Метод DELETE для  /api/v1/employee/remove/{id} с несуществующим id сотрудника должен показать ошибку, код ответа(404)
