<?php
/*
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace TwitterWidgetsTest\Options;

use TwitterWidgets\Options\WidgetOptions;
use TwitterWidgetsTest\Assets\OptionsProvider;

class WidgetOptionsTest extends OptionsProvider
{
    /**
     * @dataProvider arrayProvider
     */
    public function testOptionsCanBeGivenAsArray($options)
    {
        $widgetOptions = new WidgetOptions($options);

        $this->assertEquals('customClass', $widgetOptions->getClass());
    }


    public function testOptionsCanBeSetManually()
    {
        $widgetOptions = new WidgetOptions();
        $widgetOptions
            ->setClass('customClass')
            ->setHref('href')
            ->setHrefText('hrefText')
            ->setDataWidgetId(666)
            ->setDataTheme('dataTheme')
            ->setDataLinkColor('dataLinkColor')
            ->setWidth(666)
            ->setHeight(666)
            ->setDataChrome('noheader nofooter noborders noscrollbar transparent')
            ->setDataBorderColor('dataCordelColor')
            ->setLanguage('language')
            ->setDataTweetLimit(666)
            ->setDataRelated('dataRelated')
            ->setDataAriaPolite('dataAriaPolite');

        $this->assertEquals('customClass', $widgetOptions->getClass());
    }
}
