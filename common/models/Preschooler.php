<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "preschooler_data".
 *
 * @property integer $id
 * @property string $school_year
 * @property string $name
 * @property string $surname
 * @property string $birthdate
 * @property string $pesel
 * @property string $parent_address_city
 * @property string $parent_address_route
 * @property string $phone_number
 * @property string $parent_work_place
 * @property string $phone_work_number
 * @property string $contact_email
 * @property integer $accept_rules
 */
class Preschooler extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'preschooler_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_year'], 'required', 'message' => 'Proszę wybrać rok szkolny'],
            [['name'], 'required', 'message' => 'Proszę podać imię dziecka'],
            [['surname'], 'required', 'message' => 'Proszę podać nazwisko dziecka'],
            [['birthdate'], 'required', 'message' => 'Proszę wybrać datę urodzenia dziecka'],
            [['pesel'], 'required', 'message' => 'Proszę podać pesel dziecka'],
            [['parent_address_city'], 'required', 'message' => 'Proszę podać miasto'],
            [['parent_address_route'], 'required', 'message' => 'Proszę podać ulicę'],
            [['phone_number'], 'required', 'message' => 'Proszę podać numer telefonu'],
            [['parent_name'], 'required', 'message' => 'Proszę podać imię rodzica'],
            [['parent_surname'], 'required', 'message' => 'Proszę nazwisko rodzica'],
            [['accept_rules'], 'required', 'message' => 'Proszę zaakceptować regulamin'],
            [['birthdate'], 'safe'],
            [['birthdate'], 'safe'],
            [['accept_rules'], 'required', 'requiredValue'=>1, 'message'=>'Proszę zaakceptować regulamin'],
            [['birthdate'], 'default', 'value' => null],
            [['school_year', 'name', 'surname', 'pesel', 'parent_address_city', 'parent_address_route', 'phone_number', 'parent_work_place', 'phone_work_number', 'contact_email'], 'string', 'max' => 100],
            [['pesel'], 'unique'],
            [['phone_number'], 'unique'],
            [['contact_email'], 'unique'],
        ];
    }
   
    
    public function getYears() 
    {
        $years = [];
        $currentYear = date("Y");
        $nextYear = $currentYear +1;
        $nextThreeYears = $currentYear+3;
        
        for ($i = $currentYear; $i < $nextThreeYears; $i++)
        {
          $years[$i.'/'.$nextYear] = $currentYear .'/' .$nextYear;
          $currentYear++;
          $nextYear++;
        }

        return $years;
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_year' => 'Rok szkolny',
            'name' => 'Imię',
            'surname' => 'Nazwisko',
            'birthdate' => 'Data urodzenia',
            'pesel' => 'Pesel',
            'parent_address_city' => 'Miasto',
            'parent_address_route' => 'Ulica',
            'phone_number' => 'Numer telefonu',
            'parent_work_place' => 'Miejsce pracy rodzica',
            'phone_work_number' => 'Numer telefonu do pracy rodzica',
            'contact_email' => 'E-Mail',
            'accept_rules' => 'Akceptacja Regulaminu i przetwarzania danych',
        ];
    }
}
