<?php
declare(strict_types=1);

namespace common\models;

use yii\base\NotSupportedException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id ИД
 * @property string $email Электронная почта
 * @property string $auth_key Ключ аунтификации
 * @property string $surname Фамилия
 * @property string $name Имя
 * @property string|null $patronymic Отчество
 * @property int $position_id Должность
 * @property int $status Статус
 * @property string|null $verification_token Токен верификации
 * @property string $password_hash Хэш пароля
 * @property string|null $password_reset_token Токен сброса пароля
 * @property int $created_at Создано
 * @property int $updated_at Обновлено
 *
 * @property-read string $authKey
 * @property Position $position
 */
class User extends ActiveRecord implements IdentityInterface
{

    public const STATUS_DELETED = 0;
    public const STATUS_INACTIVE = 9;
    public const STATUS_ACTIVE = 10;
    // todo  Настроить отображение почты вместо ника для rbac(крашит)
    public string $username = '';

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id): User|IdentityInterface|null
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null): ?IdentityInterface
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['email', 'auth_key', 'surname', 'name', 'position_id', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['position_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['position_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['email', 'surname', 'name', 'patronymic', 'verification_token', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::class, 'targetAttribute' => ['position_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ИД',
            'email' => 'Электронная почта',
            'auth_key' => 'Ключ аунтификации',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'position_id' => 'Должность',
            'status' => 'Статус',
            'verification_token' => 'Токен верификации',
            'password_hash' => 'Хэш пароля',
            'password_reset_token' => 'Токен сброса пароля',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }

    /**
     * Gets query for [[Position]].
     *
     * @return ActiveQuery
     */
    public function getPosition(): ActiveQuery
    {
        return $this->hasOne(Position::class, ['id' => 'position_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey): ?bool
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @return string
     */
    public function getAuthKey(): string
    {
        return $this->auth_key;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
