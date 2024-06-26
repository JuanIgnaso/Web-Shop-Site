<x-mail::message>

@php
    $result = 0.0;
    foreach ($mailBody as $key => $value) {
        $result += $mailBody[$key]['precio'] * $mailBody[$key]['cant'];
    }
@endphp

    ![Image](cid:logo.png)

# {{$subject}}

Gracias por confiar en nosotros, tu orden está siendo procesada ahora mismo


## Detalles del pedido

<x-mail::table>
| Producto   | Precio | Cantidad |
| -------- | ------- | ---------- |
@foreach ($mailBody as $key => $value)
| {{$mailBody[$key]['nombre']}}  | {{$mailBody[$key]['precio']}} | {{$mailBody[$key]['cant']}} |
@endforeach
</x-mail::table>

# Total: {{ $result.'€' }}

<x-mail::button :url="''">
Más detalles del pedido
</x-mail::button>

Gracias,<br>
El equipo de Juan Navarrete Laravel Shop
</x-mail::message>
