<?php
/*
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace TwitterWidgetsTest\Timeline;

use TwitterWidgets\Options\WidgetOptions;
use TwitterWidgets\Timeline\TimelineBuilder;
use TwitterWidgetsTest\Assets\OptionsProvider;

class TimelineBuilderTest extends OptionsProvider
{
    protected $widgetOptions;

    protected function setUp()
    {
        $this->widgetOptions = new WidgetOptions($this->arrayProvider()[0][0]);
    }

    public function testUserTimeline()
    {
        $widgetOptions = $this->getMock(WidgetOptions::class);
        $userTimeline  = new TimelineBuilder($widgetOptions);

        $this->assertInstanceOf(TimelineBuilder::class, $userTimeline);
    }

    public function testWidgetRenderingWithOrWithoutJs()
    {
        $userTimeline = new TimelineBuilder($this->widgetOptions);

        $this->assertGreaterThan(0, strpos($userTimeline->renderWidget(), 'widgets.js'));
        $this->assertGreaterThan(0, strpos($userTimeline->renderWidget(false), 'class="customClass"'));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNonBoolThrowException()
    {
        $widgetOptions = $this->getMock(WidgetOptions::class);
        $userTimeline  = new TimelineBuilder($widgetOptions);
        $userTimeline->renderWidget('helloyesthisisdog');
    }
}
