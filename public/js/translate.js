let arrLang = {
    'eng' : {
        'home' : 'Home',
        'about' : 'About',
        'contact' : 'Contact Us',
        'jacket' : 'Jacket',
        'catalog' : 'Catalog',
        'new' : 'New',
    },
    'ar' : {
        'home' : 'الصفحة الرئيسية',
        'about' : 'من نحن',
        'contact' : 'اتصل بنا',
        'jacket' : 'جكيت',
        'catalog' : 'كتالوج',
        'new' : 'جديد',
    }
}

$(function () {
   $('.translate').click(function() {
      let lang = $(this).attr('id');
      $('.lang').each(function (index,element) {
          $(this).text(arrLang[lang][$(this).attr('key')])
      }) 
   });
});