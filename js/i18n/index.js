$(function(){

    var lang = function(){
        lang_ = localStorage.getItem('lang') ? localStorage.getItem('lang') : availables.default;
        localStorage.setItem('lang', lang_);
        return lang_;
    }

    init();

    function init(){
        $.each($('.t'), function(ind, val){
            $(this).html( translations[lang()]( $(val).data('key').toLowerCase() ) );
        });
        
        $('.flags').empty();
        $('#navbarDropdown').empty();
        
        $.each(availables, function(ind, val){
            if(ind != 'default' && lang() != val.code){
                $('.flags').append(`
                    <a class="dropdown-item a-flag" data-lang="${val.code}">
                        <img class="flag" src="img/icons/flags/${val.code}_flag.png" title="${val.native_text}">${val.code.toUpperCase()}
                    </a>
                `);
            }
        });

        $('#navbarDropdown').append(`
            <img class="flag first-flag" src="img/icons/flags/${availables[lang()].code}_flag.png" title="${availables[lang()].native_text}">
        `)
    }

    $(document).on('click', '.a-flag', function(){
        localStorage.setItem('lang', $(this).data('lang'));
        init();
    })
});