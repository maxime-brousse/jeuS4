<?php

namespace App\Entity;
use Captcha\Bundle\CaptchaBundle\Validator\Constraints as CaptchaAssert;


class Captcha
{
  /**
   * @CaptchaAssert\ValidCaptcha(
   *      message = "CAPTCHA validation failed, try again."
   * )
   */
  protected $captchaCode;

  public function getCaptchaCode()
  {
      return $this->captchaCode;
  }

  public function setCaptchaCode($captchaCode)
  {
      $this->captchaCode = $captchaCode;
  }
}
