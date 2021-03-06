<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Country extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('countrys', function (Blueprint $table) {
    		$table->bigIncrements('id');
    		$table->string('country_code');
    		$table->string('country_name');
    	});
     /*    DB::select("INSERT INTO `apps_countries` VALUES ('AF', 'Afghanistan');
INSERT INTO `apps_countries` VALUES ('AL', 'Albania');
INSERT INTO `apps_countries` VALUES ('DZ', 'Algeria');
INSERT INTO `apps_countries` VALUES ('DS', 'American Samoa');
INSERT INTO `apps_countries` VALUES ('AD', 'Andorra');
INSERT INTO `apps_countries` VALUES ('AO', 'Angola');
INSERT INTO `apps_countries` VALUES ('AI', 'Anguilla');
INSERT INTO `apps_countries` VALUES ('AQ', 'Antarctica');
INSERT INTO `apps_countries` VALUES ('AG', 'Antigua and Barbuda');
INSERT INTO `apps_countries` VALUES ('AR', 'Argentina');
INSERT INTO `apps_countries` VALUES ('AM', 'Armenia');
INSERT INTO `apps_countries` VALUES ('AW', 'Aruba');
INSERT INTO `apps_countries` VALUES ('AU', 'Australia');
INSERT INTO `apps_countries` VALUES ('AT', 'Austria');
INSERT INTO `apps_countries` VALUES ('AZ', 'Azerbaijan');
INSERT INTO `apps_countries` VALUES ('BS', 'Bahamas');
INSERT INTO `apps_countries` VALUES ('BH', 'Bahrain');
INSERT INTO `apps_countries` VALUES ('BD', 'Bangladesh');
INSERT INTO `apps_countries` VALUES ('BB', 'Barbados');
INSERT INTO `apps_countries` VALUES ('BY', 'Belarus');
INSERT INTO `apps_countries` VALUES ('BE', 'Belgium');
INSERT INTO `apps_countries` VALUES ('BZ', 'Belize');
INSERT INTO `apps_countries` VALUES ('BJ', 'Benin');
INSERT INTO `apps_countries` VALUES ('BM', 'Bermuda');
INSERT INTO `apps_countries` VALUES ('BT', 'Bhutan');
INSERT INTO `apps_countries` VALUES ('BO', 'Bolivia');
INSERT INTO `apps_countries` VALUES ('BA', 'Bosnia and Herzegovina');
INSERT INTO `apps_countries` VALUES ('BW', 'Botswana');
INSERT INTO `apps_countries` VALUES ('BV', 'Bouvet Island');
INSERT INTO `apps_countries` VALUES ('BR', 'Brazil');
INSERT INTO `apps_countries` VALUES ('IO', 'British Indian Ocean Territory');
INSERT INTO `apps_countries` VALUES ('BN', 'Brunei Darussalam');
INSERT INTO `apps_countries` VALUES ('BG', 'Bulgaria');
INSERT INTO `apps_countries` VALUES ('BF', 'Burkina Faso');
INSERT INTO `apps_countries` VALUES ('BI', 'Burundi');
INSERT INTO `apps_countries` VALUES ('KH', 'Cambodia');
INSERT INTO `apps_countries` VALUES ('CM', 'Cameroon');
INSERT INTO `apps_countries` VALUES ('CA', 'Canada');
INSERT INTO `apps_countries` VALUES ('CV', 'Cape Verde');
INSERT INTO `apps_countries` VALUES ('KY', 'Cayman Islands');
INSERT INTO `apps_countries` VALUES ('CF', 'Central African Republic');
INSERT INTO `apps_countries` VALUES ('TD', 'Chad');
INSERT INTO `apps_countries` VALUES ('CL', 'Chile');
INSERT INTO `apps_countries` VALUES ('CN', 'China');
INSERT INTO `apps_countries` VALUES ('CX', 'Christmas Island');
INSERT INTO `apps_countries` VALUES ('CC', 'Cocos (Keeling) Islands');
INSERT INTO `apps_countries` VALUES ('CO', 'Colombia');
INSERT INTO `apps_countries` VALUES ('KM', 'Comoros');
INSERT INTO `apps_countries` VALUES ('CG', 'Congo');
INSERT INTO `apps_countries` VALUES ('CK', 'Cook Islands');
INSERT INTO `apps_countries` VALUES ('CR', 'Costa Rica');
INSERT INTO `apps_countries` VALUES ('HR', 'Croatia (Hrvatska)');
INSERT INTO `apps_countries` VALUES ('CU', 'Cuba');
INSERT INTO `apps_countries` VALUES ('CY', 'Cyprus');
INSERT INTO `apps_countries` VALUES ('CZ', 'Czech Republic');
INSERT INTO `apps_countries` VALUES ('DK', 'Denmark');
INSERT INTO `apps_countries` VALUES ('DJ', 'Djibouti');
INSERT INTO `apps_countries` VALUES ('DM', 'Dominica');
INSERT INTO `apps_countries` VALUES ('DO', 'Dominican Republic');
INSERT INTO `apps_countries` VALUES ('TP', 'East Timor');
INSERT INTO `apps_countries` VALUES ('EC', 'Ecuador');
INSERT INTO `apps_countries` VALUES ('EG', 'Egypt');
INSERT INTO `apps_countries` VALUES ('SV', 'El Salvador');
INSERT INTO `apps_countries` VALUES ('GQ', 'Equatorial Guinea');
INSERT INTO `apps_countries` VALUES ('ER', 'Eritrea');
INSERT INTO `apps_countries` VALUES ('EE', 'Estonia');
INSERT INTO `apps_countries` VALUES ('ET', 'Ethiopia');
INSERT INTO `apps_countries` VALUES ('FK', 'Falkland Islands (Malvinas)');
INSERT INTO `apps_countries` VALUES ('FO', 'Faroe Islands');
INSERT INTO `apps_countries` VALUES ('FJ', 'Fiji');
INSERT INTO `apps_countries` VALUES ('FI', 'Finland');
INSERT INTO `apps_countries` VALUES ('FR', 'France');
INSERT INTO `apps_countries` VALUES ('FX', 'France, Metropolitan');
INSERT INTO `apps_countries` VALUES ('GF', 'French Guiana');
INSERT INTO `apps_countries` VALUES ('PF', 'French Polynesia');
INSERT INTO `apps_countries` VALUES ('TF', 'French Southern Territories');
INSERT INTO `apps_countries` VALUES ('GA', 'Gabon');
INSERT INTO `apps_countries` VALUES ('GM', 'Gambia');
INSERT INTO `apps_countries` VALUES ('GE', 'Georgia');
INSERT INTO `apps_countries` VALUES ('DE', 'Germany');
INSERT INTO `apps_countries` VALUES ('GH', 'Ghana');
INSERT INTO `apps_countries` VALUES ('GI', 'Gibraltar');
INSERT INTO `apps_countries` VALUES ('GK', 'Guernsey');
INSERT INTO `apps_countries` VALUES ('GR', 'Greece');
INSERT INTO `apps_countries` VALUES ('GL', 'Greenland');
INSERT INTO `apps_countries` VALUES ('GD', 'Grenada');
INSERT INTO `apps_countries` VALUES ('GP', 'Guadeloupe');
INSERT INTO `apps_countries` VALUES ('GU', 'Guam');
INSERT INTO `apps_countries` VALUES ('GT', 'Guatemala');
INSERT INTO `apps_countries` VALUES ('GN', 'Guinea');
INSERT INTO `apps_countries` VALUES ('GW', 'Guinea-Bissau');
INSERT INTO `apps_countries` VALUES ('GY', 'Guyana');
INSERT INTO `apps_countries` VALUES ('HT', 'Haiti');
INSERT INTO `apps_countries` VALUES ('HM', 'Heard and Mc Donald Islands');
INSERT INTO `apps_countries` VALUES ('HN', 'Honduras');
INSERT INTO `apps_countries` VALUES ('HK', 'Hong Kong');
INSERT INTO `apps_countries` VALUES ('HU', 'Hungary');
INSERT INTO `apps_countries` VALUES ('IS', 'Iceland');
INSERT INTO `apps_countries` VALUES ('IN', 'India');
INSERT INTO `apps_countries` VALUES ('IM', 'Isle of Man');
INSERT INTO `apps_countries` VALUES ('ID', 'Indonesia');
INSERT INTO `apps_countries` VALUES ('IR', 'Iran (Islamic Republic of)');
INSERT INTO `apps_countries` VALUES ('IQ', 'Iraq');
INSERT INTO `apps_countries` VALUES ('IE', 'Ireland');
INSERT INTO `apps_countries` VALUES ('IL', 'Israel');
INSERT INTO `apps_countries` VALUES ('IT', 'Italy');
INSERT INTO `apps_countries` VALUES ('CI', 'Ivory Coast');
INSERT INTO `apps_countries` VALUES ('JE', 'Jersey');
INSERT INTO `apps_countries` VALUES ('JM', 'Jamaica');
INSERT INTO `apps_countries` VALUES ('JP', 'Japan');
INSERT INTO `apps_countries` VALUES ('JO', 'Jordan');
INSERT INTO `apps_countries` VALUES ('KZ', 'Kazakhstan');
INSERT INTO `apps_countries` VALUES ('KE', 'Kenya');
INSERT INTO `apps_countries` VALUES ('KI', 'Kiribati');
INSERT INTO `apps_countries` VALUES ('KP', 'Korea, Democratic People''s Republic of');
INSERT INTO `apps_countries` VALUES ('KR', 'Korea, Republic of');
INSERT INTO `apps_countries` VALUES ('XK', 'Kosovo');
INSERT INTO `apps_countries` VALUES ('KW', 'Kuwait');
INSERT INTO `apps_countries` VALUES ('KG', 'Kyrgyzstan');
INSERT INTO `apps_countries` VALUES ('LA', 'Lao People''s Democratic Republic');
INSERT INTO `apps_countries` VALUES ('LV', 'Latvia');
INSERT INTO `apps_countries` VALUES ('LB', 'Lebanon');
INSERT INTO `apps_countries` VALUES ('LS', 'Lesotho');
INSERT INTO `apps_countries` VALUES ('LR', 'Liberia');
INSERT INTO `apps_countries` VALUES ('LY', 'Libyan Arab Jamahiriya');
INSERT INTO `apps_countries` VALUES ('LI', 'Liechtenstein');
INSERT INTO `apps_countries` VALUES ('LT', 'Lithuania');
INSERT INTO `apps_countries` VALUES ('LU', 'Luxembourg');
INSERT INTO `apps_countries` VALUES ('MO', 'Macau');
INSERT INTO `apps_countries` VALUES ('MK', 'Macedonia');
INSERT INTO `apps_countries` VALUES ('MG', 'Madagascar');
INSERT INTO `apps_countries` VALUES ('MW', 'Malawi');
INSERT INTO `apps_countries` VALUES ('MY', 'Malaysia');
INSERT INTO `apps_countries` VALUES ('MV', 'Maldives');
INSERT INTO `apps_countries` VALUES ('ML', 'Mali');
INSERT INTO `apps_countries` VALUES ('MT', 'Malta');
INSERT INTO `apps_countries` VALUES ('MH', 'Marshall Islands');
INSERT INTO `apps_countries` VALUES ('MQ', 'Martinique');
INSERT INTO `apps_countries` VALUES ('MR', 'Mauritania');
INSERT INTO `apps_countries` VALUES ('MU', 'Mauritius');
INSERT INTO `apps_countries` VALUES ('TY', 'Mayotte');
INSERT INTO `apps_countries` VALUES ('MX', 'Mexico');
INSERT INTO `apps_countries` VALUES ('FM', 'Micronesia, Federated States of');
INSERT INTO `apps_countries` VALUES ('MD', 'Moldova, Republic of');
INSERT INTO `apps_countries` VALUES ('MC', 'Monaco');
INSERT INTO `apps_countries` VALUES ('MN', 'Mongolia');
INSERT INTO `apps_countries` VALUES ('ME', 'Montenegro');
INSERT INTO `apps_countries` VALUES ('MS', 'Montserrat');
INSERT INTO `apps_countries` VALUES ('MA', 'Morocco');
INSERT INTO `apps_countries` VALUES ('MZ', 'Mozambique');
INSERT INTO `apps_countries` VALUES ('MM', 'Myanmar');
INSERT INTO `apps_countries` VALUES ('NA', 'Namibia');
INSERT INTO `apps_countries` VALUES ('NR', 'Nauru');
INSERT INTO `apps_countries` VALUES ('NP', 'Nepal');
INSERT INTO `apps_countries` VALUES ('NL', 'Netherlands');
INSERT INTO `apps_countries` VALUES ('AN', 'Netherlands Antilles');
INSERT INTO `apps_countries` VALUES ('NC', 'New Caledonia');
INSERT INTO `apps_countries` VALUES ('NZ', 'New Zealand');
INSERT INTO `apps_countries` VALUES ('NI', 'Nicaragua');
INSERT INTO `apps_countries` VALUES ('NE', 'Niger');
INSERT INTO `apps_countries` VALUES ('NG', 'Nigeria');
INSERT INTO `apps_countries` VALUES ('NU', 'Niue');
INSERT INTO `apps_countries` VALUES ('NF', 'Norfolk Island');
INSERT INTO `apps_countries` VALUES ('MP', 'Northern Mariana Islands');
INSERT INTO `apps_countries` VALUES ('NO', 'Norway');
INSERT INTO `apps_countries` VALUES ('OM', 'Oman');
INSERT INTO `apps_countries` VALUES ('PK', 'Pakistan');
INSERT INTO `apps_countries` VALUES ('PW', 'Palau');
INSERT INTO `apps_countries` VALUES ('PS', 'Palestine');
INSERT INTO `apps_countries` VALUES ('PA', 'Panama');
INSERT INTO `apps_countries` VALUES ('PG', 'Papua New Guinea');
INSERT INTO `apps_countries` VALUES ('PY', 'Paraguay');
INSERT INTO `apps_countries` VALUES ('PE', 'Peru');
INSERT INTO `apps_countries` VALUES ('PH', 'Philippines');
INSERT INTO `apps_countries` VALUES ('PN', 'Pitcairn');
INSERT INTO `apps_countries` VALUES ('PL', 'Poland');
INSERT INTO `apps_countries` VALUES ('PT', 'Portugal');
INSERT INTO `apps_countries` VALUES ('PR', 'Puerto Rico');
INSERT INTO `apps_countries` VALUES ('QA', 'Qatar');
INSERT INTO `apps_countries` VALUES ('RE', 'Reunion');
INSERT INTO `apps_countries` VALUES ('RO', 'Romania');
INSERT INTO `apps_countries` VALUES ('RU', 'Russian Federation');
INSERT INTO `apps_countries` VALUES ('RW', 'Rwanda');
INSERT INTO `apps_countries` VALUES ('KN', 'Saint Kitts and Nevis');
INSERT INTO `apps_countries` VALUES ('LC', 'Saint Lucia');
INSERT INTO `apps_countries` VALUES ('VC', 'Saint Vincent and the Grenadines');
INSERT INTO `apps_countries` VALUES ('WS', 'Samoa');
INSERT INTO `apps_countries` VALUES ('SM', 'San Marino');
INSERT INTO `apps_countries` VALUES ('ST', 'Sao Tome and Principe');
INSERT INTO `apps_countries` VALUES ('SA', 'Saudi Arabia');
INSERT INTO `apps_countries` VALUES ('SN', 'Senegal');
INSERT INTO `apps_countries` VALUES ('RS', 'Serbia');
INSERT INTO `apps_countries` VALUES ('SC', 'Seychelles');
INSERT INTO `apps_countries` VALUES ('SL', 'Sierra Leone');
INSERT INTO `apps_countries` VALUES ('SG', 'Singapore');
INSERT INTO `apps_countries` VALUES ('SK', 'Slovakia');
INSERT INTO `apps_countries` VALUES ('SI', 'Slovenia');
INSERT INTO `apps_countries` VALUES ('SB', 'Solomon Islands');
INSERT INTO `apps_countries` VALUES ('SO', 'Somalia');
INSERT INTO `apps_countries` VALUES ('ZA', 'South Africa');
INSERT INTO `apps_countries` VALUES ('GS', 'South Georgia South Sandwich Islands');
INSERT INTO `apps_countries` VALUES ('ES', 'Spain');
INSERT INTO `apps_countries` VALUES ('LK', 'Sri Lanka');
INSERT INTO `apps_countries` VALUES ('SH', 'St. Helena');
INSERT INTO `apps_countries` VALUES ('PM', 'St. Pierre and Miquelon');
INSERT INTO `apps_countries` VALUES ('SD', 'Sudan');
INSERT INTO `apps_countries` VALUES ('SR', 'Suriname');
INSERT INTO `apps_countries` VALUES ('SJ', 'Svalbard and Jan Mayen Islands');
INSERT INTO `apps_countries` VALUES ('SZ', 'Swaziland');
INSERT INTO `apps_countries` VALUES ('SE', 'Sweden');
INSERT INTO `apps_countries` VALUES ('CH', 'Switzerland');
INSERT INTO `apps_countries` VALUES ('SY', 'Syrian Arab Republic');
INSERT INTO `apps_countries` VALUES ('TW', 'Taiwan');
INSERT INTO `apps_countries` VALUES ('TJ', 'Tajikistan');
INSERT INTO `apps_countries` VALUES ('TZ', 'Tanzania, United Republic of');
INSERT INTO `apps_countries` VALUES ('TH', 'Thailand');
INSERT INTO `apps_countries` VALUES ('TG', 'Togo');
INSERT INTO `apps_countries` VALUES ('TK', 'Tokelau');
INSERT INTO `apps_countries` VALUES ('TO', 'Tonga');
INSERT INTO `apps_countries` VALUES ('TT', 'Trinidad and Tobago');
INSERT INTO `apps_countries` VALUES ('TN', 'Tunisia');
INSERT INTO `apps_countries` VALUES ('TR', 'Turkey');
INSERT INTO `apps_countries` VALUES ('TM', 'Turkmenistan');
INSERT INTO `apps_countries` VALUES ('TC', 'Turks and Caicos Islands');
INSERT INTO `apps_countries` VALUES ('TV', 'Tuvalu');
INSERT INTO `apps_countries` VALUES ('UG', 'Uganda');
INSERT INTO `apps_countries` VALUES ('UA', 'Ukraine');
INSERT INTO `apps_countries` VALUES ('AE', 'United Arab Emirates');
INSERT INTO `apps_countries` VALUES ('GB', 'United Kingdom');
INSERT INTO `apps_countries` VALUES ('US', 'United States');
INSERT INTO `apps_countries` VALUES ('UM', 'United States minor outlying islands');
INSERT INTO `apps_countries` VALUES ('UY', 'Uruguay');
INSERT INTO `apps_countries` VALUES ('UZ', 'Uzbekistan');
INSERT INTO `apps_countries` VALUES ('VU', 'Vanuatu');
INSERT INTO `apps_countries` VALUES ('VA', 'Vatican City State');
INSERT INTO `apps_countries` VALUES ('VE', 'Venezuela');
INSERT INTO `apps_countries` VALUES ('VN', 'Vietnam');
INSERT INTO `apps_countries` VALUES ('VG', 'Virgin Islands (British)');
INSERT INTO `apps_countries` VALUES ('VI', 'Virgin Islands (U.S.)');
INSERT INTO `apps_countries` VALUES ('WF', 'Wallis and Futuna Islands');
INSERT INTO `apps_countries` VALUES ('EH', 'Western Sahara');
INSERT INTO `apps_countries` VALUES ('YE', 'Yemen');
INSERT INTO `apps_countries` VALUES ('ZR', 'Zaire');
INSERT INTO `apps_countries` VALUES ('ZM', 'Zambia');
INSERT INTO `apps_countries` VALUES ('ZW', 'Zimbabwe');
        "); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
