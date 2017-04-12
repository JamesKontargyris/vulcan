<?php
/**
 * Palette Library
 *
 * A simple class that wraps color modification operations
 * into a simple and elegant chainable clas
 */

class Palette
{
	protected $_rgb;
	protected $_hsl;

	/**
	 * Construct a new palette given RGB values
	 */
	public static function RGB($r, $g, $b) {
		return new Palette($r, $g, $b);
	}

	/**
	 * Construct a new palette given HSL values
	 */
	public static function HSL($h, $s, $l) {
		$rgb = Palette::getRGB($h, $s, $l);
		return new Palette(
			$rgb[0],
			$rgb[1],
			$rgb[2]);
	}

	/**
	 * Constructs a new plaette given a hex value
	 */
	public static function Hex($hex) {
		$dec = hexdec($hex);
		return new Palette(
			$dec >> 16 & 0xFF,
			$dec >> 8 & 0xFF,
			$dec & 0xFF);
	}

	protected function __construct($r, $g, $b) {
		$this->_rgb = array($r, $g, $b);
		$this->_hsl = Palette::getHSL($r, $g, $b);
	}

	/**
	 * Renders the color into a product. This method does NOT chain
	 * and is intended to be called last!
	 */
	public function render() {
		return new PaletteColor(
			$this->_rgb[0],
			$this->_rgb[1],
			$this->_rgb[2]);
	}

	/**
	 * Adds relative values to the current HSL values
	 *
	 * H = 0 - 360
	 * S = 0 - 1
	 * L = 0 - 1
	 *
	 * Hue is rotated; adding 10 to 355 results in 5.
	 * Sat and Lum are both clamped.
	 */
	public function addHSL($modH, $modS, $modL) {
		// I get clever here. Shoot me.
		$this->_rgb = Palette::getRGB(
			$this->_hsl[0] = Palette::rotateHue($this->_hsl[0], $modH),
			$this->_hsl[1] = min(1.0, max(0.0, $this->_hsl[1] + $modS)),
			$this->_hsl[2] = min(1.0, max(0.0, $this->_hsl[2] + $modL))
		);

		return $this;
	}

	/**
	 * Adds relative values to the current RGB values
	 */
	public function addRGB($modR, $modG, $modB) {
		// I get clever here. Shoot me.
		$this->_hsl = Palette::getHSL(
			$this->_rgb[0] = min(255, max(0, ($this->_rgb[0] + round($modR)))),
			$this->_rgb[1] = min(255, max(0, ($this->_rgb[1] + round($modG)))),
			$this->_rgb[2] = min(255, max(0, ($this->_rgb[2] + round($modB))))
		);

		return $this;
	}

	/**
	 * Sets HSL values
	 *
	 * H = 0 - 360
	 * S = 0 - 1
	 * L = 0 - 1
	 */
	public function setHSL($modH, $modS, $modL) {
		if ($modH === null) $modH = $this->_hsl[0];
		if ($modS === null) $modS = $this->_hsl[1];
		if ($modL === null) $modL = $this->_hsl[2];

		// I get clever here. Shoot me.
		$this->_rgb = Palette::getRGB(
			$this->_hsl[0] = min(360.0, max(0.0, $modH)),
			$this->_hsl[1] = min(1.0, max(0.0, $modS)),
			$this->_hsl[2] = min(1.0, max(0.0, $modL))
		);

		return $this;
	}

	/**
	 * Sets RGB values
	 */
	public function setRGB($modR, $modG, $modB) {
		if ($modR === null) $modR = $this->_rgb[0];
		if ($modG === null) $modG = $this->_rgb[1];
		if ($modB === null) $modB = $this->_rgb[2];

		// I get clever here. Shoot me.
		$this->_hsl = Palette::getHSL(
			$this->_rgb[0] = min(255, max(0, round($modR))),
			$this->_rgb[1] = min(255, max(0, round($modG))),
			$this->_rgb[2] = min(255, max(0, round($modB)))
		);

		return $this;
	}

	/**
	 * Modifies hue individually
	 */
	public function addHue($h) {
		return $this->addHSL($h, 0, 0);
	}

	/**
	 * Modifies saturation individually
	 */
	public function addSat($s) {
		return $this->addHSL(0, $s, 0);
	}

	/**
	 * Modifies luminesance (lightness) individually
	 */
	public function addLum($l) {
		return $this->addHSL(0, 0, $l);
	}

	/**
	 * Modifies red individually
	 */
	public function addRed($r) {
		return $this->addRGB($r, 0, 0);
	}

	/**
	 * Modifies green individually
	 */
	public function addGreen($g) {
		return $this->addRGB(0, $g, 0);
	}

	/**
	 * Modifies blue individually
	 */
	public function addBlue($b) {
		return $this->addRGB(0, 0, $b);
	}

	/**
	 * Sets hue individually
	 */
	public function setHue($h) {
		return $this->setHSL(
			$h,
			null,
			null);
	}

	/**
	 * Sets saturation individually
	 */
	public function setSat($s) {
		return $this->setHSL(
			null,
			$s,
			null);
	}

	/**
	 * Sets luminesance (lightness) individually
	 */
	public function setLum($l) {
		return $this->setHSL(
			null,
			null,
			$l);
	}

	/**
	 * Sets red individually
	 */
	public function setRed($r) {
		return $this->setRGB(
			$r,
			null,
			null);
	}

	/**
	 * Sets green individually
	 */
	public function setGreen($g) {
		return $this->setRGB(
			null,
			$g,
			null);
	}

	/**
	 * Sets blue individually
	 */
	public function setBlue($b) {
		return $this->setRGB(
			null,
			null,
			$b);
	}

	/**
	 * Makes the color lighter by 10%
	 */
	public function lighter() {
		return $this->addLum(0.1);
	}

	/**
	 * Makes the color darker by 10%
	 */
	public function darker() {
		return $this->addLum(-0.1);
	}

	/**
	 * Increases the saturation by 10%
	 */
	public function bolder() {
		return $this->addSat(0.1);
	}

	/**
	 * Decreases the saturation by 10%
	 */
	public function paler() {
		return $this->addSat(-0.1);
	}

	/**
	 * Sets saturation to 100%
	 */
	public function saturate() {
		return $this->setSat(1);
	}

	/**
	 * Sets saturation to 0%
	 */
	public function desaturate() {
		return $this->setSat(0);
	}

	/**
	 * Converts RGB values to HSL values
	 * Thanks to Brandon Heyer:
	 * https://gist.github.com/brandonheyer/5254516
	 * I've made some personal changes to this method.
	 */
	public static function getHSL($r, $g, $b) {
		$oldR = $r;
		$oldG = $g;
		$oldB = $b;

		$r/= 255;
		$g/= 255;
		$b/= 255;

		$max = max($r, $g, $b);
		$min = min($r, $g, $b);

		$h;
		$s;
		$l = ($max + $min) / 2;
		$d = $max - $min;

		if ($d == 0) {
			$h = $s = 0; // achromatic
		} else {
			$s = $d / (1 - abs(2 * $l - 1));

			switch ($max) {
				case $r:
					$h = 60 * fmod((($g - $b) / $d) , 6);
					if ($b > $g) {
						$h+= 360;
					}
					break;
				case $g:
					$h = 60 * (($b - $r) / $d + 2);
					break;
				case $b:
					$h = 60 * (($r - $g) / $d + 4);
					break;
			}
		}

		return array($h, $s, $l);
	}

	/**
	 * Converts HSL values to RGB values
	 * Thanks to Brandon Heyer:
	 * https://gist.github.com/brandonheyer/5254516
	 * I've made some personal changes to this method.
	 */
	public static function getRGB($h, $s, $l) {
		$r;
		$g;
		$b;

		$c = (1 - abs(2 * $l - 1)) * $s;
		$x = $c * (1 - abs(fmod(($h / 60) , 2) - 1));
		$m = $l - ($c / 2);

		if ($h < 60) {
			$r = $c;
			$g = $x;
			$b = 0;
		} else if ($h < 120) {
			$r = $x;
			$g = $c;
			$b = 0;
		} else if ($h < 180) {
			$r = 0;
			$g = $c;
			$b = $x;
		} else if ($h < 240) {
			$r = 0;
			$g = $x;
			$b = $c;
		} else if ($h < 300) {
			$r = $x;
			$g = 0;
			$b = $c;
		} else {
			$r = $c;
			$g = 0;
			$b = $x;
		}

		$r = ($r + $m) * 255;
		$g = ($g + $m) * 255;
		$b = ($b + $m) * 255;

		return array(
			round($r),
			round($g),
			round($b)
		);
	}

	public static function rotateHue($hue, $rot) {
		return (360 + ($hue + $rot)) % 360;
	}
}

class PaletteColor
{
	protected $r;
	protected $g;
	protected $b;
	protected $h;
	protected $s;
	protected $l;

	public function __construct($r, $g, $b) {
		$this->r = $r;
		$this->g = $g;
		$this->b = $b;

		$hsl = Palette::getHSL($r, $g, $b);
		$this->h = $hsl[0];
		$this->s = $hsl[1];
		$this->l = $hsl[2];
	}

	public function red() {
		return $this->r;
	}

	public function green() {
		return $this->g;
	}

	public function blue() {
		return $this->b;
	}

	public function hue() {
		return $this->h;
	}

	public function lightness() {
		return $this->l;
	}

	public function saturation() {
		return $this->s;
	}

	public function hex($prefix = true) {
		$rgb  = $this->r << 16;
		$rgb += $this->g << 8;
		$rgb += $this->b;
		$hex = "000000" . base_convert($rgb, 10, 16);
		$hex = substr($hex, -6);
		return ($prefix ? '#' : '') . strtoupper($hex);
	}

	public function rgb() {
		return array(
			$this->r,
			$this->g,
			$this->b);
	}

	public function hsl() {
		return array(
			$this->h,
			$this->s,
			$this->l);
	}

	public function __tostring() {
		return $this->hex();
	}
}