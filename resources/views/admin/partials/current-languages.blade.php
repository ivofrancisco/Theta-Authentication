<!-- BEGIN: CURRENT LANGUAGES
==================================================== -->
<div class="g-current-languages">
    @if (\DB::table($table)->where(['reference' => $item->reference, 'language' => 'pt'])->exists())
    <a href="/admin/{{ $table }}/{{ $item->reference }}/pt/edit" class="btn btn-mini flag" title="Versão Portuguesa">
        <img src="/images/portugal.png" alt="Portuguese">
    </a>
    @endif
    @if (\DB::table($table)->where(['reference' => $item->reference, 'language' => 'en'])->exists())
    <a href="/admin/{{ $table }}/{{ $item->reference }}/en/edit" class="btn btn-mini flag" title="Versão Inglesa">
        <img src="/images/united_kingdom.png" alt="United Kingdom">
    </a>
    @endif
    @if (\DB::table($table)->where(['reference' => $item->reference, 'language' => 'fr'])->exists())
    <a href="/admin/{{ $table }}/{{ $item->reference }}/fr/edit" class="btn btn-mini flag" title="Versão Francesa">
        <img src="/images/france.png" alt="France">
    </a>
    @endif
    @if (\DB::table($table)->where(['reference' => $item->reference, 'language' => 'es'])->exists())
    <a href="/admin/{{ $table }}/{{ $item->reference }}/es/edit" class="btn btn-mini flag" title="Versão Espanhola">
        <img src="/images/spain.png" alt="Spain">
    </a>
    @endif
</div>
<!-- END: CURRENT LANGUAGES -->