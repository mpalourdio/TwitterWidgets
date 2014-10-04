<?php
/*
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace TwitterWidgets\Options;

use InvalidArgumentException;
use Zend\Stdlib\AbstractOptions;

/**
 * Class for the client side cumtomization
 *
 * @license MIT
 * @link    https://dev.twitter.com/web/embedded-timelines#customization
 * @author  mpalourdio <mpalourdio@gmail.com>
 */
class WidgetOptions extends AbstractOptions implements WidgetOptionsInterface
{
    /**
     * @var string
     *
     * CSS class for the timeline. Provides the twitter one by default
     */
    protected $class = 'twitter-timeline';
    /**
     * @var string
     *
     * Timeline URL
     */
    protected $href;

    /**
     * @var string
     *
     * Text for the link that appears above the timeline
     * ie: tweets from @mpalourdio
     */
    protected $hrefText;

    /**
     * @var string
     *
     * Your widget ID
     */
    protected $dataWidgetId;
    /**
     * @var string
     *
     * Set by adding a data-theme="dark" attribute to the embed code.
     */
    protected $dataTheme;
    /**
     * @var string
     *
     * Theme: Set by adding a data-link-color="#cc0000" attribute.
     * Note that some icons in the widget will also appear this color.
     */
    protected $dataLinkColor;

    /**
     * @var int
     *
     * Set using the standard HTML width attribute on the embed code (units are pixels.)
     */
    protected $width;
    /**
     * @var int
     *
     * Set using the standard HTML height attribute on the embed code (units are pixels.)
     */
    protected $height;
    /**
     * @var string
     *
     * Control the widget layout and chrome
     */
    protected $dataChrome;
    /**
     * @var string
     *
     * Change the border color used by the widget. Takes an #abc123 hex format color e.g. data-border-color="#cc0000"
     */
    protected $dataBorderColor;

    /**
     * @var string
     *
     * The widget language is detected from the page, based on the HTML lang attribute of your content.
     * You can also set the HTML lang attribute on the embed code itself.
     */
    protected $language;
    /**
     * @var int
     *
     * To fix the size of a timeline to a preset number of Tweets, use the data-tweet-limit="5" attribute with any value
     * between 1 and 20 Tweets. The timeline will render the specified number of Tweets from the timeline, expanding the
     * height of the widget to display all Tweets without scrolling. Since the widget is of a fixed size, it will not
     * poll for updates when using this option.
     */
    protected $dataTweetLimit;
    /**
     * @var string
     *
     * As per the Tweet and follow buttons, you may provide a comma-separated list of user screen names as suggested
     * followers to a user after they reply, Retweet, or favorite a Tweet in the timeline. Use a
     * data-related="benward,endform" attribute on the embed code.
     */
    protected $dataRelated;
    /**
     * @var string
     *
     * ARIA is an accessibility system that aids people using assistive technology interacting with dynamic web content.
     * Read more about ARIA on W3C’s website. By default, the embedded timeline uses the least obtrusive
     * setting: aria-polite="polite". If you’re using an embedded timeline as a primary source of content on your
     * page, you may wish to override this to the assertive setting, using data-aria-polite="assertive".
     */
    protected $dataAriaPolite;

    /**
     * @return string
     */
    public function getDataChrome()
    {
        return $this->dataChrome;
    }

    /**
     * @param  string $dataChrome
     * @throws InvalidArgumentException
     * @return self
     */
    public function setDataChrome($dataChrome)
    {
        if (!is_string($dataChrome) && null !== $dataChrome) {
            throw new InvalidArgumentException('An string is expected for chrome parameter');
        }

        $this->dataChrome = $dataChrome;

        return $this;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param  string $class
     * @throws InvalidArgumentException
     * @return self
     */
    public function setClass($class)
    {
        if (!is_string($class) && null !== $class) {
            throw new InvalidArgumentException('String expected for class parameter');
        }

        $this->class = $class;

        return $this;
    }

    /**
     * @return string
     */
    public function getDataAriaPolite()
    {
        return $this->dataAriaPolite;
    }

    /**
     * @param  string $dataAriaPolite
     * @throws InvalidArgumentException
     * @return self
     */
    public function setDataAriaPolite($dataAriaPolite)
    {
        if (!is_string($dataAriaPolite) && null !== $dataAriaPolite) {
            throw new InvalidArgumentException('String expected for dataAriaPolite parameter');
        }

        $this->dataAriaPolite = $dataAriaPolite;

        return $this;
    }

    /**
     * @return string
     */
    public function getDataBorderColor()
    {
        return $this->dataBorderColor;
    }

    /**
     * @param  string $dataBorderColor
     * @throws InvalidArgumentException
     * @return self
     */
    public function setDataBorderColor($dataBorderColor)
    {
        if (!is_string($dataBorderColor) && null !== $dataBorderColor) {
            throw new InvalidArgumentException('String expected for dataBorderColor parameter');
        }

        $this->dataBorderColor = $dataBorderColor;

        return $this;
    }

    /**
     * @return string
     */
    public function getDataLinkColor()
    {
        return $this->dataLinkColor;
    }

    /**
     * @param  string $dataLinkColor
     * @throws InvalidArgumentException
     * @return self
     */
    public function setDataLinkColor($dataLinkColor)
    {
        if (!is_string($dataLinkColor) && null !== $dataLinkColor) {
            throw new InvalidArgumentException('String expected for dataLinkColor parameter');
        }

        $this->dataLinkColor = $dataLinkColor;

        return $this;
    }

    /**
     * @return string
     */
    public function getDataRelated()
    {
        return $this->dataRelated;
    }

    /**
     * @param  string $dataRelated
     * @throws InvalidArgumentException
     * @return self
     */
    public function setDataRelated($dataRelated)
    {
        if (!is_string($dataRelated) && null !== $dataRelated) {
            throw new InvalidArgumentException('String expected for dataRelated parameter');
        }

        $this->dataRelated = $dataRelated;

        return $this;
    }

    /**
     * @return string
     */
    public function getDataTheme()
    {
        return $this->dataTheme;
    }

    /**
     * @param  string $dataTheme
     * @throws InvalidArgumentException
     * @return self
     */
    public function setDataTheme($dataTheme)
    {
        if (!is_string($dataTheme) && null !== $dataTheme) {
            throw new InvalidArgumentException('String expected for dataTheme parameter');
        }

        $this->dataTheme = $dataTheme;

        return $this;
    }

    /**
     * @return int
     */
    public function getDataTweetLimit()
    {
        return $this->dataTweetLimit;
    }

    /**
     * @param  int $dataTweetLimit
     * @throws InvalidArgumentException
     * @return self
     */
    public function setDataTweetLimit($dataTweetLimit)
    {
        if (!is_int($dataTweetLimit) && null !== $dataTweetLimit) {
            throw new InvalidArgumentException('Integer expected for dataTweetLimit parameter');
        }

        $this->dataTweetLimit = $dataTweetLimit;

        return $this;
    }

    /**
     * @return string
     */
    public function getDataWidgetId()
    {
        return $this->dataWidgetId;
    }

    /**
     * @param  string $dataWidgetId
     * @throws InvalidArgumentException
     * @return self
     *
     * Note: long integers will be converted to float (32 bits). Give this setter a string
     */
    public function setDataWidgetId($dataWidgetId)
    {
        if (!is_string($dataWidgetId) && null !== $dataWidgetId) {
            throw new InvalidArgumentException(
                'String is expected for dataWidgetId (long int can lead to float conversion)'
            );
        }

        $this->dataWidgetId = $dataWidgetId;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param  int $height
     * @throws InvalidArgumentException
     * @return self
     */
    public function setHeight($height)
    {
        if (!is_int($height) && null !== $height) {
            throw new InvalidArgumentException('Integer expected for height parameter');
        }

        $this->height = $height;

        return $this;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param  string $href
     * @throws InvalidArgumentException
     * @return self
     */
    public function setHref($href)
    {
        if (!is_string($href) && null !== $href) {
            throw new InvalidArgumentException('String expected for href parameter');
        }

        $this->href = $href;

        return $this;
    }

    /**
     * @return string
     */
    public function getHrefText()
    {
        return $this->hrefText;
    }

    /**
     * @param  string $hrefText
     * @throws InvalidArgumentException
     * @return self
     */
    public function setHrefText($hrefText)
    {
        if (!is_string($hrefText) && null !== $hrefText) {
            throw new InvalidArgumentException('String expected for hrefText parameter');
        }

        $this->hrefText = $hrefText;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param  string $language
     * @throws InvalidArgumentException
     * @return self
     */
    public function setLanguage($language)
    {
        if (!is_string($language) && null !== $language) {
            throw new InvalidArgumentException('String expected for language parameter');
        }

        $this->language = $language;

        return $this;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param  int $width
     * @throws InvalidArgumentException
     * @return self
     */
    public function setWidth($width)
    {
        if (!is_int($width) && null !== $width) {
            throw new InvalidArgumentException('Integer expected for width parameter');
        }

        $this->width = $width;

        return $this;
    }
}
