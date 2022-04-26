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

    'accepted' => ':attribute должен быть принят.',
    'accepted_if' => ':attribute должен быть принят, когда :other это :value.',
    'active_url' => ':attribute не является валидным URL.',
    'after' => ':attribute должен быть датой позднее :date.',
    'after_or_equal' => ':attribute должен быть датой позднее или равен :date.',
    'alpha' => ':attribute должен содержать только буквы.',
    'alpha_dash' => ':attribute должен содержать только буквы, цифры, дефисы и подчёркивания.',
    'alpha_num' => ':attribute может содержать только буквы и цифры.',
    'array' => ':attribute должен быть массивом.',
    'before' => ':attribute должен быть датой ранее :date.',
    'before_or_equal' => ':attribute должен быть датой ранее или равен :date.',
    'between' => [
        'array' => ':attribute должен быть между :min и :max.',
        'file' => ':attribute должен быть между :min и :max килобайтов.',
        'numeric' => ':attribute должен быть между :min и :max.',
        'string' => ':attribute должен быть между :min и :max букв.',
    ],
    'boolean' => ':attribute поле должно быть true или false.',
    'confirmed' => ':attribute подтверждение не соответствует.',
    'current_password' => 'password не корректен.',
    'date' => ':attribute не является валидной датой.',
    'date_equals' => ':attribute должен быть датой, равной :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'declined' => ':attribute должен быть отклонённым.',
    'declined_if' => ':attribute должен быть отклонённым, когда :other это :value.',
    'different' => ':attribute и :other должны быть отличными друг от друга.',
    'digits' => ':attribute должен иметь :digits цифр.',
    'digits_between' => ':attribute должен иметь между :min и :max цифр.',
    'dimensions' => ':attribute имеет неверные размеры изображения.',
    'distinct' => ':attribute поле имеет дублирующееся значение.',
    'email' => ':attribute должен быть валидным email адресом.',
    'ends_with' => ':attribute должен заканчиваться одним из следующих значений: :values.',
    'enum' => 'выбранный :attribute не валиден.',
    'exists' => 'выбранный :attribute существует.',
    'file' => ':attribute должен быть файлом.',
    'filled' => ':attribute поле должно быть заполненным.',
    'gt' => [
        'array' => ':attribute должен иметь больше, чем :value значений.',
        'file' => ':attribute должен быть больше :value килобайтов.',
        'numeric' => ':attribute должен быть больше :value.',
        'string' => ':attribute должен быть больше :value букв.',
    ],
    'gte' => [
        'array' => ':attribute должен иметь :value значнеий или больше.',
        'file' => ':attribute должен быть бошльше или равен :value килобайтов.',
        'numeric' => ':attribute должен быть больше или равен :value.',
        'string' => ':attribute должен быть больше или равен :value букв.',
    ],
    'image' => ':attribute должен быть изображением.',
    'in' => 'выбранный :attribute не валиден.',
    'in_array' => ':attribute поле не существует в :other.',
    'integer' => ':attribute должен быть числом.',
    'ip' => ':attribute должен быть валидным IP адресом.',
    'ipv4' => ':attribute должен быть валидным IPv4 адресом.',
    'ipv6' => ':attribute должен быть валидным IPv6 адресом.',
    'json' => ':attribute должен быть валидной JSON строкой.',
    'lt' => [
        'array' => ':attribute должен иметь меньше :value значений.',
        'file' => ':attribute должен быть меньше :value килобайтов.',
        'numeric' => ':attribute должен быть меньше :value.',
        'string' => ':attribute должен быть меньше :value букв.',
    ],
    'lte' => [
        'array' => ':attribute не должен иметь больше :value значений.',
        'file' => ':attribute должен быть меньше или равен :value килобайтов.',
        'numeric' => ':attribute должен быть меньше или равен :value.',
        'string' => ':attribute должен быть меньше или равен :value букв.',
    ],
    'mac_address' => ':attribute должен быть валидным MAC адресом.',
    'max' => [
        'array' => ':attribute не должен иметь больше :max значений.',
        'file' => ':attribute не должен быть больше :max килобайтов.',
        'numeric' => ':attribute не должен быть больше :max.',
        'string' => ':attribute не должен быть больше :max букв.',
    ],
    'mimes' => ':attribute должен быть одним из типов файлов: :values.',
    'mimetypes' => ':attribute должен быть файлом типа: :values.',
    'min' => [
        'array' => ':attribute должен иметь минимум :min значений.',
        'file' => ':attribute должен быть минимум :min килобайтов.',
        'numeric' => ':attribute должен быть минимум :min.',
        'string' => ':attribute должен иметь минимум :min букв.',
    ],
    'multiple_of' => ':attribute должен быть кратным :value.',
    'not_in' => 'выбранный :attribute не валиден.',
    'not_regex' => ':attribute формат не валиден.',
    'numeric' => ':attribute должен быть числом.',
    'present' => ':attribute должен присутствовать.',
    'prohibited' => ':attribute поле запрещено.',
    'prohibited_if' => ':attribute поле запрещено когда :other это :value.',
    'prohibited_unless' => ':attribute поле запрещено до тех пор, пока :other присутствует в :values.',
    'prohibits' => ':attribute поле запрещает :other присутствовать.',
    'regex' => ':attribute формат не валиден.',
    'required' => ':attribute требуется.',
    'required_array_keys' => ':attribute поле должно содержать записи для: :values.',
    'required_if' => ':attribute поле требуется кода :other является :value.',
    'required_unless' => ':attribute поле требуется до тех пор, пока :other присутствует в :values.',
    'required_with' => ':attribute поле требутеся когда :values присутствуют.',
    'required_with_all' => ':attribute поле требуется когда :values присутствуют.',
    'required_without' => ':attribute поле требуется, когда :values не присутствуют.',
    'required_without_all' => ':attribute поле требуется когда ни один из :values не присутствуют.',
    'same' => ':attribute и :other должны совпадать.',
    'size' => [
        'array' => ':attribute должен содержать :size значений.',
        'file' => ':attribute должен быть :size килобайтов.',
        'numeric' => ':attribute должен быть :size.',
        'string' => ':attribute должен быть :size букв.',
    ],
    'starts_with' => ':attribute должен начинаться с одного из следующих значений: :values.',
    'string' => ':attribute должен быть строкой.',
    'timezone' => ':attribute должен быть валидной таймзоной.',
    'unique' => ':attribute уже занят.',
    'uploaded' => ':attribute не удалось загрузить.',
    'url' => ':attribute должен быть валидным URL.',
    'uuid' => ':attribute должен быть валидным UUID.',

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

    'attributes' => [],

];
