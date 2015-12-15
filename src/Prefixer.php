<?php

namespace DustinLeblanc\Autoprefixer;

use Sabberworm\CSS\Parser;

/**
 * Class Prefixer
 * @property  browsers
 * @package DustinLeblanc\Autoprefixer
 */
class Prefixer
{
    protected $browsers;

    /**
     * @param array $browsers
     */
    public function __construct(array $browsers)
    {
        $this->browsers = $browsers;
    }

    /**
     * @param string $css
     * @return string
     */
    public function prefix($css)
    {
        $parser = new Parser($css);
        $parsedCss = $parser->parse();
        $prefixedRules = array_map(
          function ($ruleSet) {
              return array_filter($ruleSet->getRules(), function ($rule) {
                  if ($this->needsPrefix($rule)) {
                      return $this->prefixRule($rule);
                  }
              });
          }, $parsedCss->getAllRuleSets());
        return $parsedCss->render();
    }

    /**
     * @return mixed
     */
    public function getBrowsers()
    {
        return $this->browsers;
    }

    /**
     * @param mixed $browsers
     */
    public function setBrowsers($browsers)
    {
        $this->browsers = $browsers;
    }

    /**
     * @param $rule
     *
     * @return bool
     */
    private function needsPrefix($rule)
    {
        return in_array($rule, $this->getSupported($this->browsers));
    }

    /**
     * @param $rule
     *
     * @return array
     */
    private function prefixRule($rule)
    {
        return [];
    }

    private function getSupported(array $browsers)
    {
        return [];
    }
}
