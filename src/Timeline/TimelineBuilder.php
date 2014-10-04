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

use InvalidArgumentException;
use TwitterWidgets\Options\WidgetOptionsInterface;
use Zend\Filter\FilterChain;
use Zend\Filter\StringToLower;
use Zend\Filter\Word\SeparatorToSeparator;

class TimelineBuilder implements TimelineBuilderInterface
{
    private $options;
    private $addJs;
    private $filteredAttr;

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
        $attributesList = $this->filteredAttr;
        $widget         = '<a';

        foreach ($attributesList as $attrKey => $attrValue) {
            $widget .= ' ' . $attrKey . '="' . $attrValue . '"';
        }
        $widget .= '>';
        $widget .= $this->options['href_text'];
        $widget .= '</a>';

        if ($this->addJs) {
            return $widget . "\n<script>" . $this->getSingleWidgetJs() . "</script>";
        }

        return $widget;
    }

    /**
     * @param  bool $addJs
     * @return string
     * @throws InvalidArgumentException
     */
    public function renderWidget($addJs = true)
    {
        if (!is_bool($addJs)) {
            throw new InvalidArgumentException('TimelineBuilder#renderWidget expects a boolean as parameter');
        }
        $this->addJs        = $addJs;
        $this->filteredAttr = $this->filterAttr();

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

    /**
     * @return array
     */
    private function filterAttr()
    {
        if (!is_array($this->options)) {
            $this->options = $this->options->toArray();
        }

        $filterChain = new FilterChain();
        $filterChain
            ->attach(new SeparatorToSeparator('_', '-'))
            ->attach(new StringToLower());

        $filteredAttr = [];
        foreach ($this->options as $attribute => $value) {
            if (null !== $value) {
                $filteredAttr[$filterChain->filter($attribute)] = $value;
            }
        }

        unset($filteredAttr['href-text']);

        return $filteredAttr;
    }
}
