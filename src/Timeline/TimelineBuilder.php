<?php
/*
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace TwitterWidgets\Timeline;

use TwitterWidgets\Options\WidgetOptionsInterface;

class TimelineBuilder implements TimelineBuilderInterface
{
    protected $options;
    protected $widgetJs;

    /**
     * @param WidgetOptionsInterface $options
     */
    public function __construct(WidgetOptionsInterface $options)
    {
        $this->options = $options;
    }

    /**
     * @param  bool $addJs
     * @return string
     */
    public function buildWidget($addJs = true)
    {
        $options = $this->options->toArray();
        $widget  =
            '<a' . ((null !== $options['class']) ? ' class="' . $options['class'] . '"' : '') .
            ((null !== $options['href']) ? ' href="' . $options['href'] . '"' : '') .
            ((null !== $options['data_widget_id']) ? ' data-widget-id="' . $options['data_widget_id'] . '"' : '') .
            ((null !== $options['data_theme']) ? ' data-theme="' . $options['data_theme'] . '"' : '') .
            ((null !== $options['data_link_color']) ? ' data-link-color="' . $options['data_link_color'] . '"' : '') .
            ((null !== $options['width']) ? ' width="' . $options['width'] . '"' : '') .
            ((null !== $options['height']) ? ' height="' . $options['height'] . '"' : '') .
            ((null !== $options['data_chrome']) ? ' data-chrome="' . $options['data_chrome'] . '"' : '') .
            ((null !== $options['data_border_color']) ? ' data-border-color="' . $options['data_border_color'] . '"' : '') .
            ((null !== $options['language']) ? ' lang="' . $options['language'] . '"' : '') .
            ((null !== $options['data_tweet_limit']) ? ' data-tweet-limit="' . $options['data_tweet_limit'] . '"' : '') .
            ((null !== $options['data_related']) ? ' data-related="' . $options['data_related'] . '"' : '') .
            ((null !== $options['data_aria_polite']) ? ' data-aria-polite="' . $options['data_aria_polite'] . '"' : '') .
            '>' . ((null !== $options['href_text']) ? $options['href_text'] : '') . '</a>';

        if ($addJs) {
            return $widget . "\n<script>" . $this->getWidgetJs() . "</script>";
        }

        return $widget;
    }

    /**
     * @return string
     */
    public function renderWidget()
    {
        return $this->buildWidget();
    }

    /**
     * @return string
     *
     * Add the necessary code for a single widget
     */
    public function getWidgetJs()
    {
        return '!function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? \'http\' : \'https\';
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = p + "://platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");';
    }

    /**
     * @return string
     *
     * Adds this before your </body> for performance instead of relying on getWidgetJs()
     * @link https://dev.twitter.com/web/javascript/loading
     */
    public function getOneTimeWidgetJs()
    {
        return '<script>window.twttr = (function (d, s, id) {
                  var t, js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src= "https://platform.twitter.com/widgets.js";
                  fjs.parentNode.insertBefore(js, fjs);
                  return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
                }(document, "script", "twitter-wjs"));</script>';
    }
}
