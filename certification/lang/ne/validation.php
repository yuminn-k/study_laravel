<?php

declare(strict_types=1);

return [
    'accepted'             => ':Attribute स्वीकार गरिएको हुनुपर्छ।',
    'accepted_if'          => ':Other :value हुँदा :attribute लाई स्वीकार गर्नुपर्छ।',
    'active_url'           => ':Attribute URL अमान्य छ।',
    'after'                => ':Attribute को मिति :date भन्दा पछि हुनुपर्छ।',
    'after_or_equal'       => ':Attribute मिति पछाडि वा बराबर मिति हुनुपर्दछ।',
    'alpha'                => ':Attribute मा अक्षरहरु मात्र हुनसक्छ।',
    'alpha_dash'           => ':Attribute मा अक्षर, संख्या र ड्यासहरू मात्र हुनसक्छ।',
    'alpha_num'            => ':Attribute मा अक्षर र संख्याहरू मात्र हुनसक्छ।',
    'array'                => ':Attribute एर्रे हुनुपर्छ।',
    'ascii'                => ':Attribute मा एकल-बाइट अल्फान्यूमेरिक वर्ण र प्रतीकहरू मात्र समावेश हुनुपर्छ।',
    'before'               => ':Attribute को मिति :date भन्दा अघि हुनुपर्छ।',
    'before_or_equal'      => ':Attribute मिति भन्दा अघि वा बराबर :date हुनुपर्दछ।',
    'between'              => [
        'array'   => ':Attribute आइटमको संख्या :min र :max को बिचमा हुनुपर्छ।',
        'file'    => ':Attribute :min र :max किलोबाइट्स को बिचमा हुनुपर्छ।',
        'numeric' => ':Attribute :min र :maxको बिचमा हुनुपर्छ।',
        'string'  => ':Attribute :min र :max वर्णको बिचमा हुनुपर्छ।',
    ],
    'boolean'              => ':Attribute ठिक अथवा बेठिक हुनुपर्छ।',
    'can'                  => ':Attribute फिल्डमा अनाधिकृत मान समावेश छ।',
    'confirmed'            => ':Attribute दाेहाेर्याइएकाे मिलेन।',
    'current_password'     => 'पासवर्ड गलत छ।',
    'date'                 => ':Attribute को मिति मिलेन।',
    'date_equals'          => ':Attribute मिति बराबर :date हुनुपर्दछ।',
    'date_format'          => ':Attribute को ढाँचा :format जस्तो हुनुपर्छ।',
    'decimal'              => ':Attribute मा :decimal दशमलव स्थानहरू हुनुपर्छ।',
    'declined'             => ':Attribute लाई अस्वीकार गर्नुपर्छ।',
    'declined_if'          => ':Other :value हुँदा :attribute लाई अस्वीकार गर्नुपर्छ।',
    'different'            => ':Attribute र :other फरक हुनुपर्छ।',
    'digits'               => ':Attribute :digits अंकको हुनुपर्छ।',
    'digits_between'       => ':Attribute :min देखी :max अंकको हुनुपर्छ।',
    'dimensions'           => ':Attribute अमान्य छवि आयाम छ।',
    'distinct'             => ':Attribute फिल्ड फिल्डको नक्कल मान छ',
    'doesnt_end_with'      => ':Attribute निम्न मध्ये एक संग समाप्त नहुन सक्छ: :values।',
    'doesnt_start_with'    => ':Attribute निम्न मध्ये एकबाट सुरु नहुन सक्छ: :values।',
    'email'                => ':Attribute को इमेल ठेगाना मिलेन।',
    'ends_with'            => ':Attribute निम्न मध्ये एकको साथ विशेषता अन्त हुनुपर्दछ :values',
    'enum'                 => 'चयन गरिएको :attribute अमान्य छ।',
    'exists'               => 'छानिएको :attribute अमान्य छ।',
    'file'                 => ':Attribute एक फाईल हुनुपर्दछ।',
    'filled'               => ':Attribute दिइएको हुनुपर्छ।',
    'gt'                   => [
        'array'   => ':Attribute :value आईटमहरू भन्दा बढि हुनुपर्दछ।',
        'file'    => ':Attribute :value क्यालोबाइट भन्दा बढि हुनुपर्दछ।',
        'numeric' => ':Attribute :value भन्दा बढि हुनुपर्दछ।',
        'string'  => ':Attribute :value क्यारेक्टर भन्दा बढि हुनुपर्दछ।',
    ],
    'gte'                  => [
        'array'   => ':Attribute :value आईटमहरू भन्दा बढि हुनुपर्दछ।',
        'file'    => ':Attribute :value क्यालोबाइट भन्दा बढि हुनुपर्दछ।',
        'numeric' => ':Attribute :value भन्दा बढि हुनुपर्दछ।',
        'string'  => ':Attribute :value क्यारेक्टर भन्दा बढि हुनुपर्दछ।',
    ],
    'image'                => ':Attribute मा फोटो हुनुपर्छ।',
    'in'                   => 'छानिएको :attribute अमान्य छ।',
    'in_array'             => ':Attribute क्षेत्र मा अवस्थित छैन :other',
    'integer'              => ':Attribute पूर्ण संख्या हुनुपर्छ।',
    'ip'                   => ':Attribute मा दिइएको मान्य IP ठेगाना हुनुपर्छ।',
    'ipv4'                 => ':Attribute एक मान्य IPv4 ठेगाना हुनुपर्दछ.',
    'ipv6'                 => ':Attribute एक मान्य IPv6 ठेगाना हुनुपर्दछ.',
    'json'                 => ':Attribute मा दिइएको मान्य JSON स्ट्रिङ्ग हुनुपर्छ।',
    'lowercase'            => ':Attribute लोअरकेस हुनुपर्छ।',
    'lt'                   => [
        'array'   => ':Attribute :value आईटमहरू भन्दा बढि हुनुपर्दछ।',
        'file'    => ':Attribute :value क्यालोबाइट भन्दा बढि हुनुपर्दछ।',
        'numeric' => ':Attribute :value भन्दा बढि हुनुपर्दछ।',
        'string'  => ':Attribute :value क्यारेक्टर भन्दा बढि हुनुपर्दछ।',
    ],
    'lte'                  => [
        'array'   => ':Attribute :value आईटमहरू भन्दा बढि हुनुपर्दछ।',
        'file'    => ':Attribute :value क्यालोबाइट भन्दा बढि हुनुपर्दछ।',
        'numeric' => ':Attribute :value भन्दा बढि हुनुपर्दछ।',
        'string'  => ':Attribute :value क्यारेक्टर भन्दा बढि हुनुपर्दछ।',
    ],
    'mac_address'          => ':Attribute मान्य MAC ठेगाना हुनुपर्छ।',
    'max'                  => [
        'array'   => ':Attribute मा :max आईटमहरू भन्दा बढि हुनुपर्दछ।',
        'file'    => ':Attribute :max क्यालोबाइट भन्दा बढि हुनुपर्दछ।',
        'numeric' => ':Attribute :max भन्दा बढि हुनुपर्दछ।',
        'string'  => ':Attribute :max क्यारेक्टर भन्दा बढि हुनुपर्दछ।',
    ],
    'max_digits'           => ':Attribute मा :max अंक भन्दा बढी हुनु हुँदैन।',
    'mimes'                => ':Attribute :values प्रकारको फाइल हुनुपर्छ।',
    'mimetypes'            => ':Attribute :values प्रकारको फाइल हुनुपर्छ।',
    'min'                  => [
        'array'   => ':Attribute मा कम्तिमा :min आइटम हुनुपर्छ।',
        'file'    => ':Attribute कम्तिमा :min क्यालोबाइटोकाे हुनुपर्छ।',
        'numeric' => ':Attribute कम्तिमा :min हुनुपर्छ।',
        'string'  => ':Attribute कम्तिमा :min वर्णको हुनुपर्छ।',
    ],
    'min_digits'           => ':Attribute मा कम्तिमा :min अंक हुनु पर्छ।',
    'missing'              => ':Attribute फिल्ड हराइरहेको हुनुपर्छ।',
    'missing_if'           => ':Other :value हुँदा :attribute फिल्ड हराइरहेको हुनुपर्छ।',
    'missing_unless'       => ':Other :value नभएसम्म :attribute फिल्ड हराइरहेको हुनुपर्छ।',
    'missing_with'         => ':Values उपस्थित हुँदा :attribute फिल्ड हराइरहेको हुनुपर्छ।',
    'missing_with_all'     => ':Values उपस्थित हुँदा :attribute फिल्ड हराइरहेको हुनुपर्छ।',
    'multiple_of'          => 'यो :attribute को एक धेरै हुनुपर्छ :value',
    'not_in'               => 'छानिएको :attribute अमान्य छ।',
    'not_regex'            => ':Attribute ढाँचा अवैध छ.',
    'numeric'              => ':Attribute संख्या हुनुपर्छ।',
    'password'             => [
        'letters'       => ':Attribute मा कम्तिमा एउटा अक्षर हुनु पर्छ।',
        'mixed'         => ':Attribute मा कम्तिमा एउटा ठूलो र एउटा सानो अक्षर हुनु पर्छ।',
        'numbers'       => ':Attribute मा कम्तिमा एक नम्बर हुनु पर्छ।',
        'symbols'       => ':Attribute मा कम्तिमा एउटा प्रतीक हुनु पर्छ।',
        'uncompromised' => 'दिइएको :attribute डाटा लीकमा देखा परेको छ। कृपया फरक १०० छान्नुहोस्।',
    ],
    'present'              => ':Attribute क्षेत्र उपस्थित हुनुपर्दछ.',
    'prohibited'           => 'यो :attribute क्षेत्र निषेध छ ।',
    'prohibited_if'        => 'यो :attribute क्षेत्र निषेध छ जब :other छ :value.',
    'prohibited_unless'    => 'यो :attribute क्षेत्र निषेध छ नभएसम्म :other छ :values.',
    'prohibits'            => ':Attribute फिल्डले :other लाई उपस्थित हुन निषेध गर्दछ।',
    'regex'                => ':Attribute को ढाँचा मिलेन।',
    'required'             => ':Attribute दिइएको हुनुपर्छ।',
    'required_array_keys'  => ':Attribute फिल्डमा :values को लागि प्रविष्टिहरू समावेश हुनुपर्छ।',
    'required_if'          => ':Attribute चाहिन्छ जब :other :value हुन्छ।',
    'required_if_accepted' => ':Other स्वीकृत हुँदा :attribute फिल्ड आवश्यक हुन्छ।',
    'required_unless'      => ':Other :values मा नभएसम्म :attribute चाहिन्छ।',
    'required_with'        => ':Values भएसम्म :attribute चाहिन्छ।',
    'required_with_all'    => ':Values भएसम्म :attribute चाहिन्छ।',
    'required_without'     => ':Values नभएको बेला :attribute चाहिन्छ।',
    'required_without_all' => 'कुनैपनि :values नभएको बेला :attribute चाहिन्छ।',
    'same'                 => ':Attribute र :other मिल्नुपर्छ।',
    'size'                 => [
        'array'   => ':Attribute :sizeमा आइटम हुनुपर्छ।',
        'file'    => ':Attribute :size क्यालोबाइटोकाे हुनुपर्छ।',
        'numeric' => ':Attribute :size हुनुपर्छ।',
        'string'  => ':Attribute :size वर्णको हुनुपर्छ।.',
    ],
    'starts_with'          => ':Attribute निम्न मध्ये एकसँग सुरू हुनुपर्दछ :values',
    'string'               => ':Attribute स्ट्रिङ्ग हुनुपर्छ।',
    'timezone'             => ':Attribute मान्य समय क्षेत्र हुनुपर्छ।',
    'ulid'                 => ':Attribute मान्य ULID हुनुपर्छ।',
    'unique'               => 'यो :attribute पहिले नै लिई सकेको छ।',
    'uploaded'             => ':Attribute अपलोड गर्न असफल भयो।',
    'uppercase'            => '१०० अपरकेस हुनुपर्छ।',
    'url'                  => ':Attribute को ढांचा मिलेन।',
    'uuid'                 => ':Attribute एक मान्य UUID हुनुपर्दछ।',
];
