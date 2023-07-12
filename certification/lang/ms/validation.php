<?php

declare(strict_types=1);

return [
    'accepted'             => ':Attribute mesti diterima pakai.',
    'accepted_if'          => ':Attribute mesti diterima pakai sekiranya :other adalah :value.',
    'active_url'           => ':Attribute bukan URL yang sah.',
    'after'                => ':Attribute mesti tarikh selepas :date.',
    'after_or_equal'       => ':Attribute mesti tarikh selepas atau sama dengan :date.',
    'alpha'                => ':Attribute hanya boleh mengandungi huruf.',
    'alpha_dash'           => ':Attribute boleh mengandungi huruf, nombor, dan sengkang.',
    'alpha_num'            => ':Attribute boleh mengandungi huruf dan nombor.',
    'array'                => ':Attribute mesti jujukan.',
    'ascii'                => ':Attribute mesti hanya mengandungi aksara dan simbol alfanumerik bait tunggal.',
    'before'               => ':Attribute mesti tarikh sebelum :date.',
    'before_or_equal'      => ':Attribute mesti tarikh sebelum atau sama dengan :date.',
    'between'              => [
        'array'   => ':Attribute mesti mengandungi antara :min dan :max perkara.',
        'file'    => ':Attribute mesti mengandungi antara :min dan :max kilobait.',
        'numeric' => ':Attribute mesti mengandungi antara :min dan :max.',
        'string'  => ':Attribute mesti mengandungi antara :min dan :max aksara.',
    ],
    'boolean'              => ':Attribute mesti benar atau salah.',
    'can'                  => 'Medan :attribute mengandungi nilai yang tidak dibenarkan.',
    'confirmed'            => ':Attribute pengesahan yang tidak sepadan.',
    'current_password'     => 'Katalaluan anda adalah salah.',
    'date'                 => ':Attribute bukan tarikh yang sah.',
    'date_equals'          => ':Attribute mesti tarikh sama dengan :date.',
    'date_format'          => ':Attribute tidak mengikut format :format.',
    'decimal'              => ':Attribute mesti mempunyai :decimal tempat perpuluhan.',
    'declined'             => ':Attribute mesti ditolak.',
    'declined_if'          => ':Attribute mesti ditolak apabila :other adalah :value.',
    'different'            => ':Attribute dan :other mesti berlainan.',
    'digits'               => ':Attribute mesti :digits.',
    'digits_between'       => ':Attribute mesti mengandungi antara :min dan :max digits.',
    'dimensions'           => ':Attribute tidak sah',
    'distinct'             => ':Attribute adalah nilai yang berulang',
    'doesnt_end_with'      => ':Attribute mungkin tidak berakhir dengan salah satu daripada yang berikut: :values.',
    'doesnt_start_with'    => ':Attribute mungkin tidak bermula dengan salah satu daripada yang berikut: :values.',
    'email'                => ':Attribute tidak sah.',
    'ends_with'            => ':Attribute mesti berakhir dengan salah satu dari: :values.',
    'enum'                 => ':Attribute yang dipilih adalah tidak sah.',
    'exists'               => ':Attribute tidak sah.',
    'file'                 => ':Attribute mesti fail yang sah.',
    'filled'               => ':Attribute diperlukan.',
    'gt'                   => [
        'array'   => ':Attribute mesti mengandungi lebih daripada :value perkara.',
        'file'    => ':Attribute mesti melebihi :value kilobait.',
        'numeric' => ':Attribute mesti melebihi :value.',
        'string'  => ':Attribute mesti melebihi :value aksara.',
    ],
    'gte'                  => [
        'array'   => ':Attribute mesti mengandungi :value perkara atau lebih.',
        'file'    => ':Attribute mesti melebihi atau bersamaan :value kilobait.',
        'numeric' => ':Attribute mesti melebihi atau bersamaan :value.',
        'string'  => ':Attribute mesti melebihi atau bersamaan :value aksara.',
    ],
    'image'                => ':Attribute mesti imej.',
    'in'                   => ':Attribute tidak sah.',
    'in_array'             => ':Attribute tidak wujud dalam :other.',
    'integer'              => ':Attribute mesti integer.',
    'ip'                   => ':Attribute mesti alamat IP yang sah.',
    'ipv4'                 => ':Attribute mesti alamat IPv4 yang sah.',
    'ipv6'                 => ':Attribute mesti alamat IPv6 yang sah',
    'json'                 => ':Attribute mesti JSON yang sah.',
    'lowercase'            => ':Attribute mestilah huruf kecil.',
    'lt'                   => [
        'array'   => ':Attribute mesti mengandungi kurang daripada :value perkara.',
        'file'    => ':Attribute mesti kurang daripada :value kilobait.',
        'numeric' => ':Attribute mesti kurang daripada :value.',
        'string'  => ':Attribute mesti kurang daripada :value aksara.',
    ],
    'lte'                  => [
        'array'   => ':Attribute mesti mengandungi kurang daripada atau bersamaan dengan :value perkara.',
        'file'    => ':Attribute mesti kurang daripada atau bersamaan dengan :value kilobait.',
        'numeric' => ':Attribute mesti kurang daripada atau bersamaan dengan :value.',
        'string'  => ':Attribute mesti kurang daripada atau bersamaan dengan :value aksara.',
    ],
    'mac_address'          => ':Attribute mestilah alamat MAC yang sah.',
    'max'                  => [
        'array'   => 'Jumlah :attribute mesti tidak melebihi :max perkara.',
        'file'    => 'Jumlah :attribute mesti tidak melebihi :max kilobait.',
        'numeric' => 'Jumlah :attribute mesti tidak melebihi :max.',
        'string'  => 'Jumlah :attribute mesti tidak melebihi :max aksara.',
    ],
    'max_digits'           => ':Attribute tidak boleh mempunyai lebih daripada :max digit.',
    'mimes'                => ':Attribute mesti fail type: :values.',
    'mimetypes'            => ':Attribute mesti fail type: :values.',
    'min'                  => [
        'array'   => 'Jumlah :attribute mesti sekurang-kurangnya :min perkara.',
        'file'    => 'Jumlah :attribute mesti sekurang-kurangnya :min kilobait.',
        'numeric' => 'Jumlah :attribute mesti sekurang-kurangnya :min.',
        'string'  => 'Jumlah :attribute mesti sekurang-kurangnya :min aksara.',
    ],
    'min_digits'           => ':Attribute mesti mempunyai sekurang-kurangnya :min digit.',
    'missing'              => 'Medan :attribute mesti tiada.',
    'missing_if'           => 'Medan :attribute mesti tiada apabila :other ialah :value.',
    'missing_unless'       => 'Medan :attribute mesti tiada melainkan :other ialah :value.',
    'missing_with'         => 'Medan :attribute mesti tiada apabila :values hadir.',
    'missing_with_all'     => 'Medan :attribute mesti tiada apabila :values hadir.',
    'multiple_of'          => ':Attribute mesti gandaan :value',
    'not_in'               => ':Attribute tidak sah.',
    'not_regex'            => 'Format :attribute adalah tidak sah.',
    'numeric'              => ':Attribute mesti nombor.',
    'password'             => [
        'letters'       => ':Attribute mesti mengandungi sekurang-kurangnya satu huruf.',
        'mixed'         => ':Attribute mesti mengandungi sekurang-kurangnya satu huruf besar dan satu huruf kecil.',
        'numbers'       => ':Attribute mesti mengandungi sekurang-kurangnya satu nombor.',
        'symbols'       => ':Attribute mesti mengandungi sekurang-kurangnya satu simbol.',
        'uncompromised' => ':Attribute yang diberikan telah muncul dalam kebocoran data. Sila pilih :attribute yang berbeza.',
    ],
    'present'              => 'Ruangan :attribute mesti wujud.',
    'prohibited'           => 'Ruangan :attribute adalah dilarang.',
    'prohibited_if'        => 'Ruangan :attribute adalah dilarang apabila :other adalah :value.',
    'prohibited_unless'    => 'Ruangan :attribute adalah dilarang kecuali :other adalah di :values.',
    'prohibits'            => 'Medan :attribute melarang :other daripada hadir.',
    'regex'                => 'Format :attribute tidak sah.',
    'required'             => 'Ruangan :attribute diperlukan.',
    'required_array_keys'  => 'Medan :attribute mesti mengandungi entri untuk: :values.',
    'required_if'          => 'Ruangan :attribute diperlukan bila :other sama dengan :value.',
    'required_if_accepted' => 'Medan :attribute diperlukan apabila :other diterima.',
    'required_unless'      => 'Ruangan :attribute diperlukan sekiranya :other ada dalam :values.',
    'required_with'        => 'Ruangan :attribute diperlukan bila :values wujud.',
    'required_with_all'    => 'Ruangan :attribute diperlukan bila :values wujud.',
    'required_without'     => 'Ruangan :attribute diperlukan bila :values tidak wujud.',
    'required_without_all' => 'Ruangan :attribute diperlukan bila kesemua :values wujud.',
    'same'                 => 'Ruangan :attribute dan :other mesti sepadan.',
    'size'                 => [
        'array'   => 'Saiz :attribute mesti mengandungi :size perkara.',
        'file'    => 'Saiz :attribute mesti :size kilobait.',
        'numeric' => 'Saiz :attribute mesti :size.',
        'string'  => 'Saiz :attribute mesti :size aksara.',
    ],
    'starts_with'          => ':Attribute mesti bermula dengan salah satu dari: :values',
    'string'               => ':Attribute mesti aksara.',
    'timezone'             => ':Attribute mesti zon masa yang sah.',
    'ulid'                 => ':Attribute mestilah ULID yang sah.',
    'unique'               => ':Attribute telah wujud.',
    'uploaded'             => ':Attribute gagal dimuat naik.',
    'uppercase'            => ':Attribute mestilah huruf besar.',
    'url'                  => ':Attribute format tidak sah.',
    'uuid'                 => ':Attribute mesti UUID yang sah.',
];
