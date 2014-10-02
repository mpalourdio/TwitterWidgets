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
    protected $addJs;
    protected $widgetJs;

    /**
     * @param WidgetOptionsInterface $options
     */
    public function __construct(WidgetOptionsInterface $options)
    {
        $this->options = $options;
    }

    /**
     * @return string
     */
    private function buildWidget()
    {
        $options = $this->options->toArray();

        $widget =
            '<a' . ((null !== $options['class']) ? ' class="' . $options['class'] . '"' : '') .
            ((null !== $options['href']) ? ' href="' . $options['href'] . '"' : '') .
            ((null !== $options['data_widget_id']) ? ' data-widget-id="' . $options['data_widget_id'] . '"' : '') .
            ((null !== $options['data_theme']) ? ' data-theme="' . $options['data_theme'] . '"' : '') .
            ((null !== $options['data_link_color']) ? ' data-link-color="' . $options['data_link_color'] . '"' : '') .
            ((null !== $options['width']) ? ' width="' . $options['width'] . '"' : '') .
            ((null !== $options['height']) ? ' height="' . $options['height'] . '"' : '') .
            ((null !== $options['data_chrome']) ? ' data-chrome="' . $options['data_chrome'] . '"' : '') .
            ((null !== $options['language']) ? ' lang="' . $options['language'] . '"' : '') .
            ((null !== $options['data_related']) ? ' data-related="' . $options['data_related'] . '"' : '') .
            ((null !== $options['data_border_color']) ?
                ' data-border-color="' . $options['data_border_color'] . '"' :
                '') .
            ((null !== $options['data_tweet_limit']) ?
                ' data-tweet-limit="' . $options['data_tweet_limit'] . '"' :
                '') .

            ((null !== $options['data_aria_polite']) ?
                ' data-aria-polite="' . $options['data_aria_polite'] . '"' :
                '') .
            '>' . ((null !== $options['href_text']) ? $options['href_text'] : '') . '</a>';

        if ($this->addJs) {
            return $widget . "\n<script>" . $this->getSingleWidgetJs() . "</script>";
        }

        return $widget;
    }

    /**
     * @param  bool $addJs
     * @return string
     */
    public function renderWidget($addJs = true)
    {
        $this->addJs = $addJs;

        return $this->buildWidget();
    }

    /**
     * @return string
     *
     * Add the necessary code for a single widget
     */
    private function getSingleWidgetJs()
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
}
