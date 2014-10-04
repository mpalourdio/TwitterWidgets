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

use ReflectionClass;
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
        $widgetOptions   = $this->getMock(WidgetOptions::class);
        $timelineBuilder = new TimelineBuilder($widgetOptions);

        $this->assertInstanceOf(TimelineBuilder::class, $timelineBuilder);
    }

    public function testWidgetRenderingWithJs()
    {
        $timelineBuilder = $this
            ->getMockBuilder(TimelineBuilder::class)
            ->disableOriginalConstructor()
            ->setMethods(['filterAttr', 'getSingleWidgetJs'])
            ->getMock();

        $timelineBuilder
            ->expects($this->once())
            ->method('filterAttr')
            ->willReturn([]);

        $timelineBuilder
            ->expects($this->once())
            ->method('getSingleWidgetJs')
            ->willReturn('achievement unlocked!');

        $this->assertGreaterThan(0, strpos($timelineBuilder->renderWidget(), 'achievement unlocked!'));
    }

    public function testWidgetRenderingWithoutJs()
    {
        $timelineBuilder = $this
            ->getMockBuilder(TimelineBuilder::class)
            ->disableOriginalConstructor()
            ->setMethods(['filterAttr', 'getSingleWidgetJs'])
            ->getMock();

        $timelineBuilder
            ->expects($this->once())
            ->method('filterAttr')
            ->willReturn([]);

        $timelineBuilder
            ->expects($this->never())
            ->method('getSingleWidgetJs')
            ->willReturn('achievement unlocked!');

        $this->assertEquals(0, strpos($timelineBuilder->renderWidget(false), 'achievement unlocked!'));
    }

    public function testUnsetValuesAreNotRendered()
    {
        $this->widgetOptions->setClass(null);
        $timelineBuilder = new TimelineBuilder($this->widgetOptions);

        $this->assertEquals(0, strpos($timelineBuilder->renderWidget(false), 'class="customClass"'));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNonBoolThrowException()
    {
        $widgetOptions   = $this->getMock(WidgetOptions::class);
        $timelineBuilder = new TimelineBuilder($widgetOptions);

        $timelineBuilder->renderWidget('helloyesthisisdog');
    }

    public function testOneTimeJsReturnsNeededCode()
    {
        $widgetOptions   = $this->getMock(WidgetOptions::class);
        $timelineBuilder = new TimelineBuilder($widgetOptions);

        $reflected = new ReflectionClass(TimelineBuilder::class);
        $method    = $reflected->getMethod('getSingleWidgetJs');
        $method->setAccessible(true);

        $this->assertGreaterThan(0, strpos($method->invokeArgs($timelineBuilder, []), 'widgets.js'));
    }
}
