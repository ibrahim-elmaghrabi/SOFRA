<x-mail::message>
    # Introduction
    SOFRA Rest Passsword
    
        hello {{ $user->name }}
    
     Your reset code is : {{ $user->pin_code }}


    Thanks,<br>
    SOFRA
</x-mail::message>