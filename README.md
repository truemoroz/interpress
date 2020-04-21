# interpress
тестовое задание для interpress.kz

Тестовое задание:
У вас есть доступ к таблице с данными о галереях. Необходимо создать автоматически генерируемый файл sitemap.xml по данным из таблицы.

Таблицы:

gallery_motorshow.sql – таблица с данными отдельных галерей

gallery_motorshow_events.sql – таблица с данными о событиях и годах их проведения
gallery_motorshow_places.sql – таблица с данными названий событий

Результат ссылки на галерею формируется из набора данных:

site.com - домен сайта
detroit – из таблицы gallery_motorshow_places.sql
2016 - из таблицы gallery_motorshow_events.sql
2015_audi_a4_2_0_tfsi_quattro_s_line_detroit - из таблицы gallery_motorshow.sql
Результат должен выглядеть:

```xml
<url>
<loc>https://site.com/detroit/2016/2015_audi_a4_2_0_tfsi_quattro_s_line_detroit/</loc>
<changefreq>weekly</changefreq>
<priority>0.80</priority>
</url>
```
 
На выходе должен получиться файл, который можно будет запустить, и он сгенерирует карту сайта.
