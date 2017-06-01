<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
//use app\models\Rol;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "usuario".
 *
 * @property integer $id_usuario
 * @property string $user
 * @property string $pass
 * @property integer $id_rol
 * @property string $nombre
 * @property string $apellido
 *
 * @property Perfil[] $perfils
 * @property Rol $idRol
 */
class Usuario extends \yii\db\ActiveRecord  implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'pass', 'id_rol', 'nombre', 'apellido'], 'required'],
            [['id_rol'], 'integer'],
            [['user', 'pass', 'nombre', 'apellido'], 'string', 'max' => 40],
            [['user'], 'unique'],
            [['id_rol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['id_rol' => 'id_rol']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'user' => 'Usuario',
            'pass' => 'Contraseña',
            'id_rol' => 'Rol del Usuario',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfils()
    {
        return $this->hasMany(Perfil::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['id_rol' => 'id_rol']);
    }


    public static function findIdentity($id)

  {

      return static::findOne($id);

  }

  /**
   * @inheritdoc
   */



  public static function findIdentityByAccessToken($token, $type = null)

  {

        return static::findOne(['access_token' => $token]);

  }



  /**
   * Finds user by username
   *
   * @param  string      $username
   * @return static|null
   */

  public static function findByUser($user)

  {

      return static::findOne(['user' => $user]);

  }


  /**
   * Finds user by password reset token
   *
   * @param  string      $token password reset token
   * @return static|null
   */

  public static function findByPasswordResetToken($token)

  {

      $expire = \Yii::$app->params['usuario.passwordResetTokenExpire'];

      $parts = explode('_', $token);

      $timestamp = (int) end($parts);

      if ($timestamp + $expire < time()) {

          // token expired

          return null;

      }

      return static::findOne([

          'password_reset_token' => $token

      ]);

  }



  public function getId()

  {

      return $this->getPrimaryKey();

  }




  public function getAuthKey()

  {

      return $this->auth_key;

  }




  public function validateAuthKey($authKey)

  {

      return $this->getAuthKey() === $authKey;

  }



  public function validatePass($pass)

  {
      return $this->pass === sha1($pass);


  }




  public function setPassword($pass)

  {

      $this->password_hash = Security::generatePasswordHash($pass);

  }



  public function generateAuthKey()

  {

      $this->auth_key = Security::generateRandomKey();

  }



  public function generatePasswordResetToken()

  {

      $this->password_reset_token = Security::generateRandomKey() . '_' . time();

  }


  public function removePasswordResetToken()

  {

      $this->password_reset_token = null;

  }

  public function getDescripcionRol()

  {
      $tipoRol = Rol::find()->orderBy('descripcion')->asArray()->all();    
      $rolDescripcionLista = ArrayHelper::map($tipoRol, 'id_rol', 'descripcion'); 
      return $rolDescripcionLista;

  }
  public function getDescripcionRolSolo($id)

  {
    $rows = (new \yii\db\Query())
    ->select(['descripcion'])
    ->from('rol')
    ->where(['id_rol' => $id])    
    ->all();

    return $rows;
  }

}
