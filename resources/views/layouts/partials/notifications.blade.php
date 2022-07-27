<li>
    <h6 class="dropdown-header">Notificações</h6>
</li>
@forelse ($notifications as $notif)

    @php $data = json_decode($notif->data); @endphp

    <a class="link-item btn-notifications" href="" id="{{$notif->id}}" data-id="{{$data->contact->id}}">
        <div class="link-item border-top border-bottom">
            @if ($notif->type == "App\Notifications\CardTargetUser")
                <p class="title-notification">
                    Você foi marcado em um Card
                </p>
                <p class="content-notification text-justify">
                    O contato "{{$data->contact->name}}" agora faz parte de seus cards, clique para ver.
                </p>
            @endif
            @if ($notif->type == "App\Notifications\MoveAutoToRecontact")
            <p class="title-notification">
                Um card foi movido automaticamente.
            </p>
            <p class="content-notification text-justify">
                O "{{$data->contact->name}}" foi movido para recontactar, clique para ver.
            </p>
        @endif
            {{-- Contato: Juvenir Alves dos santos, clique para acompanhar --}}

            <p class="time-notification text-right px-2 d-flex justify-content-end">{{dateFriendly($notif->created_at)}}</p>
        </div>
    </a>
@empty
<p class="title-notification text-justify">Não há notificações</p>
@endforelse
{{--
{
    "contact":
    {
        "id":5,
        "user_id":1,
        "status":1,
        "list":"budgetSent",
        "name":"Alessandro de Oliveira",
        "cellphone":"17988262545",
        "city":"Mirassol",
        "email":"caique@gmail.com",
        "origin":"facebook Ads",
        "responsible_id":1,
        "responsibleOffice":"Rio Preto",
        "created_at":"2022-04-12T00:27:23.000000Z",
        "updated_at":"2022-04-16T01:40:30.000000Z"
    }
}
 --}}
