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

    'accepted'             => ':attribute должен быть принят.',
    'active_url'           => ':attribute недопустимый URL-адрес.',
    'after'                => ':attribute должно быть после :date.',
    'after_or_equal'       => ':attribute must be a date after or equal to :date.',
    'alpha'                => ':attribute может содержать только буквы.',
    'alpha_dash'           => ':attribute может содержать только буквы, цифры, тире и подчеркивания.',
    'alpha_num'            => ':attribute может содержать только буквы и цифры.',
    'array'                => ':attribute должен быть массивом.',
    'before'               => ':attribute must be a date before :date.',
    'before_or_equal'      => ':attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => ':attribute должно быть между :min и :max.',
        'file'    => ':attribute должно быть между :min и :max килобайт.',
        'string'  => ':attribute должно быть между :min и :max символов.',
        'array'   => ':attribute должно быть между :min и :max items.',
    ],
    'boolean'              => ':attribute поле должно быть true или false.',
    'confirmed'            => ':attribute подтверждение не совпадают.',
    'date'                 => ':attribute не является допустимой датой.',
    'date_format'          => ':attribute не соответствует формату :format.',
    'different'            => ':attribute и :other должна быть другой.',
    'digits'               => ':attribute должен быть :digits десятичные знаки.',
    'digits_between'       => ':attribute должно быть между :min и :max десятичные знаки.',
    'dimensions'           => ':attribute имеет недопустимые размеры изображения.',
    'distinct'             => ':attribute поле имеет повторяющееся значение.',
    'email'                => ':attribute должен быть действительный адрес электронной почты.',
    'exists'               => ' выбараный :attribute недопустимый.',
    'file'                 => ':attribute должен быть файл.',
    'filled'               => ':attribute поле должно иметь значение.',
    'gt'                   => [
        'numeric' => ':attribute должно быть больше :value.',
        'file'    => ':attribute должно быть больше :value килобайт.',
        'string'  => ':attribute должно быть больше :value символов.',
        'array'   => ':attribute должно быть больше, чем :value элемент.',
    ],
    'gte'                  => [
        'numeric' => ':attribute должно быть больше или равно :value.',
        'file'    => ':attribute должно быть больше или равно :value килобайт.',
        'string'  => ':attribute должно быть больше или равно :value символов.',
        'array'   => ':attribute должно быть :value больше элемента.',
    ],
    'image'                => ':attribute должно быть изображение.',
    'in'                   => 'выбранный :attribute недопустимый.',
    'in_array'             => ':attribute поле не существует в :other.',
    'integer'              => ':attribute должно быть целым числом.',
    'ip'                   => ':attribute должен быть действительный IP-адрес.',
    'ipv4'                 => ':attribute должен быть допустимым IPv4-адресом.',
    'ipv6'                 => ':attribute должен быть допустимым IPv6-адресом.',
    'json'                 => ':attribute должна быть допустимой строкой JSON.',
    'lt'                   => [
        'numeric' => ':attribute должно быть меньше :value.',
        'file'    => ':attribute должно быть меньше :value килобайт.',
        'string'  => ':attribute должно быть меньше :value символов.',
        'array'   => ':attribute должно быть меньше, чем :value элемент.',
    ],
    'lte'                  => [
        'numeric' => ':attribute должно быть меньше или равно :value.',
        'file'    => ':attribute должно быть меньше или равно :value килобайт.',
        'string'  => ':attribute должно быть меньше или равно :value символов.',
        'array'   => ':attribute не должен иметь больше чем :value элемент.',
    ],
    'max'                  => [
        'numeric' => ':attribute не может быть больше, чем :max.',
        'file'    => ':attribute не может быть больше, чем :max килобайт.',
        'string'  => ':attribute не может быть больше, чем :max символов.',
        'array'   => ':attribute не может быть более :max элемент.',
    ],
    'mimes'                => ':attribute должен быть файл типа: :values.',
    'mimetypes'            => ':attribute должен быть файл типа: :values.',
    'min'                  => [
        'numeric' => ':attribute должно быть по крайней мере :min.',
        'file'    => ':attribute должно быть по крайней мере :min килобайт.',
        'string'  => ':attribute должно быть по крайней мере :min символов.',
        'array'   => ':attribute должен иметь по крайней мере :min элемент.',
    ],
    'not_in'               => 'выбранный :attribute недопустимый.',
    'not_regex'            => ':attribute недопустимый формат.',
    'numeric'              => ':attribute должно быть числом.',
    'present'              => ':attribute поле должно присутствовать.',
    'regex'                => ':attribute недопустимый формат.',
    'required'             => ':attribute поле обязательное.',
    'required_if'          => ':attribute обязательное поле для :other быть :value.',
    'required_unless'      => ':attribute поле обязательное, если :other быть :values.',
    'required_with'        => ':attribute обязательное поле для :values присутствующий.',
    'required_with_all'    => ':attribute обязательное поле для :values присутствующий.',
    'required_without'     => ':attribute обязательное поле для :values нет.',
    'required_without_all' => ':attribute поле является обязательным, если :values присутствовать.',
    'same'                 => ':attribute и :other должен соответствовать.',
    'size'                 => [
        'numeric' => ':attribute должен быть :size.',
        'file'    => ':attribute должен быть :size kilobytes.',
        'string'  => ':attribute должен быть :size characters.',
        'array'   => ':attribute должен содержать :size items.',
    ],
    'string'               => ':attribute должна быть строка.',
    'timezone'             => ':attribute допустимая зона.',
    'unique'               => ':attribute уже принят.',
    'uploaded'             => ':attribute не удалось загрузить.',
    'url'                  => ':attribute недопустимый формат.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
