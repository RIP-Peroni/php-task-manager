<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':Attribute должен быть принят.',
    'accepted_if' => ':Attribute должен быть принят, когда :other это :value.',
    'active_url' => ':Attribute не является валидным URL.',
    'after' => ':Attribute должен быть датой позднее :date.',
    'after_or_equal' => ':Attribute должен быть датой позднее или равен :date.',
    'alpha' => ':Attribute должен содержать только буквы.',
    'alpha_dash' => ':Attribute должен содержать только буквы, цифры, дефисы и подчёркивания.',
    'alpha_num' => ':Attribute может содержать только буквы и цифры.',
    'array' => ':Attribute должен быть массивом.',
    'before' => ':Attribute должен быть датой ранее :date.',
    'before_or_equal' => ':Attribute должен быть датой ранее или равен :date.',
    'between' => [
        'array' => ':Attribute должен быть между :min и :max символов.',
        'file' => ':Attribute должен быть между :min и :max килобайтов.',
        'numeric' => ':Attribute должен быть между :min и :max.',
        'string' => ':Attribute должен быть между :min и :max символов.',
    ],
    'boolean' => ':Attribute поле должно быть true или false.',
    'confirmed' => ':Attribute и подтверждение не совпадают.',
    'current_password' => 'password не корректен.',
    'date' => ':Attribute не является валидной датой.',
    'date_equals' => ':Attribute должен быть датой, равной :date.',
    'date_format' => ':Attribute не соответствует формату :format.',
    'declined' => ':Attribute должен быть отклонённым.',
    'declined_if' => ':Attribute должен быть отклонённым, когда :other это :value.',
    'different' => ':Attribute и :other должны быть отличными друг от друга.',
    'digits' => ':Attribute должен иметь :digits цифр.',
    'digits_between' => ':Attribute должен иметь между :min и :max цифр.',
    'dimensions' => ':Attribute имеет неверные размеры изображения.',
    'distinct' => ':Attribute поле имеет дублирующееся значение.',
    'email' => ':Attribute должен быть валидным email адресом.',
    'ends_with' => ':Attribute должен заканчиваться одним из следующих символов: :values.',
    'enum' => 'выбранный :Attribute не валиден.',
    'exists' => 'выбранный :Attribute существует.',
    'file' => ':Attribute должен быть файлом.',
    'filled' => ':Attribute поле должно быть заполненным.',
    'gt' => [
        'array' => ':Attribute должен иметь больше, чем :value символов.',
        'file' => ':Attribute должен быть больше :value килобайтов.',
        'numeric' => ':Attribute должен быть больше :value.',
        'string' => ':Attribute должен быть больше :value символов.',
    ],
    'gte' => [
        'array' => ':Attribute должен иметь :value значнеий или больше.',
        'file' => ':Attribute должен быть бошльше или равен :value килобайтов.',
        'numeric' => ':Attribute должен быть больше или равен :value.',
        'string' => ':Attribute должен быть больше или равен :value символов.',
    ],
    'image' => ':Attribute должен быть изображением.',
    'in' => 'выбранный :Attribute не валиден.',
    'in_array' => ':Attribute поле не существует в :other.',
    'integer' => ':Attribute должен быть числом.',
    'ip' => ':Attribute должен быть валидным IP адресом.',
    'ipv4' => ':Attribute должен быть валидным IPv4 адресом.',
    'ipv6' => ':Attribute должен быть валидным IPv6 адресом.',
    'json' => ':Attribute должен быть валидной JSON строкой.',
    'lt' => [
        'array' => ':Attribute должен иметь меньше :value символов.',
        'file' => ':Attribute должен быть меньше :value килобайтов.',
        'numeric' => ':Attribute должен быть меньше :value.',
        'string' => ':Attribute должен быть меньше :value символов.',
    ],
    'lte' => [
        'array' => ':Attribute не должен иметь больше :value символов.',
        'file' => ':Attribute должен быть меньше или равен :value килобайтов.',
        'numeric' => ':Attribute должен быть меньше или равен :value.',
        'string' => ':Attribute должен быть меньше или равен :value символов.',
    ],
    'mac_address' => ':Attribute должен быть валидным MAC адресом.',
    'max' => [
        'array' => ':Attribute не должен иметь больше :max символов.',
        'file' => ':Attribute не должен быть больше :max килобайтов.',
        'numeric' => ':Attribute не должен быть больше :max.',
        'string' => ':Attribute не должно быть больше :max символов.',
    ],
    'mimes' => ':Attribute должен быть одним из типов файлов: :values.',
    'mimetypes' => ':Attribute должен быть файлом типа: :values.',
    'min' => [
        'array' => ':Attribute должен иметь минимум :min символов.',
        'file' => ':Attribute должен быть минимум :min килобайтов.',
        'numeric' => ':Attribute должен быть минимум :min.',
        'string' => ':Attribute должен иметь длину не менее :min символов.',
    ],
    'multiple_of' => ':Attribute должен быть кратным :value.',
    'not_in' => 'выбранный :Attribute не валиден.',
    'not_regex' => ':Attribute формат не валиден.',
    'numeric' => ':Attribute должен быть числом.',
    'present' => ':Attribute должен присутствовать.',
    'prohibited' => ':Attribute поле запрещено.',
    'prohibited_if' => ':Attribute поле запрещено когда :other это :value.',
    'prohibited_unless' => ':Attribute поле запрещено до тех пор, пока :other присутствует в :values.',
    'prohibits' => ':Attribute поле запрещает :other присутствовать.',
    'regex' => ':Attribute формат не валиден.',
    'required' => 'Это обязательное поле',
    'required_array_keys' => ':Attribute поле должно содержать записи для: :values.',
    'required_if' => ':Attribute поле требуется кода :other является :value.',
    'required_unless' => ':Attribute поле требуется до тех пор, пока :other присутствует в :values.',
    'required_with' => ':Attribute поле требутеся когда :values присутствуют.',
    'required_with_all' => ':Attribute поле требуется когда :values присутствуют.',
    'required_without' => ':Attribute поле требуется, когда :values не присутствуют.',
    'required_without_all' => ':Attribute поле требуется когда ни один из :values не присутствуют.',
    'same' => ':Attribute и :other должны совпадать.',
    'size' => [
        'array' => ':Attribute должен содержать :size символов.',
        'file' => ':Attribute должен быть :size килобайтов.',
        'numeric' => ':Attribute должен быть :size.',
        'string' => ':Attribute должен быть :size символов.',
    ],
    'starts_with' => ':Attribute должен начинаться с одного из следующих символов: :values.',
    'string' => ':Attribute должен быть строкой.',
    'timezone' => ':Attribute должен быть валидной таймзоной.',
    'unique' => ':Attribute уже занято.',
    'uploaded' => ':Attribute не удалось загрузить.',
    'url' => ':Attribute должен быть валидным URL.',
    'uuid' => ':Attribute должен быть валидным UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        "name" => "имя",
        "password" => "пароль",
        "email" => "e-mail",
        "password_confirmation" => "подтверждение"
    ],

];
