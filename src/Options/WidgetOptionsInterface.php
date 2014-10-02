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

/**
 * Class for the client side cumtomization
 *
 * @license MIT
 * @link    https://dev.twitter.com/web/embedded-timelines#customization
 * @author  mpalourdio <mpalourdio@gmail.com>
 */
interface WidgetOptionsInterface
{
    /**
     * @return string
     */
    public function getDataChrome();

    /**
     * @param  string $dataChrome
     * @return self
     */
    public function setDataChrome($dataChrome);

    /**
     * @return string
     */
    public function getClass();

    /**
     * @param  string $class
     * @return self
     */
    public function setClass($class);

    /**
     * @return string
     */
    public function getDataAriaPolite();

    /**
     * @param  string $dataAriaPolite
     * @return self
     */
    public function setDataAriaPolite($dataAriaPolite);

    /**
     * @return string
     */
    public function getDataBorderColor();

    /**
     * @param  string $dataBorderColor
     * @return self
     */
    public function setDataBorderColor($dataBorderColor);

    /**
     * @return string
     */
    public function getDataLinkColor();

    /**
     * @param  string $dataLinkColor
     * @return self
     */
    public function setDataLinkColor($dataLinkColor);

    /**
     * @return string
     */
    public function getDataRelated();

    /**
     * @param  string $dataRelated
     * @return self
     */
    public function setDataRelated($dataRelated);

    /**
     * @return string
     */
    public function getDataTheme();

    /**
     * @param  string $dataTheme
     * @return self
     */
    public function setDataTheme($dataTheme);

    /**
     * @return int
     */
    public function getDataTweetLimit();

    /**
     * @param  int $dataTweetLimit
     * @return self
     */
    public function setDataTweetLimit($dataTweetLimit);

    /**
     * @return int
     */
    public function getDataWidgetId();

    /**
     * @param  int $dataWidgetId
     * @return self
     */
    public function setDataWidgetId($dataWidgetId);

    /**
     * @return int
     */
    public function getHeight();

    /**
     * @param  int $height
     * @return self
     */
    public function setHeight($height);

    /**
     * @return string
     */
    public function getHref();

    /**
     * @param  string $href
     * @return self
     */
    public function setHref($href);

    /**
     * @return string
     */
    public function getHrefText();

    /**
     * @param  string $hrefText
     * @return self
     */
    public function setHrefText($hrefText);

    /**
     * @return string
     */
    public function getLanguage();

    /**
     * @param  string $language
     * @return self
     */
    public function setLanguage($language);

    /**
     * @return int
     */
    public function getWidth();

    /**
     * @param  int $width
     * @return self
     */
    public function setWidth($width);
}
