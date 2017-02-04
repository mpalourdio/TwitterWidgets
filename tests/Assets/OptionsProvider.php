<?php
/*
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace TwitterWidgetsTest\Assets;

use PHPUnit\Framework\TestCase;

class OptionsProvider extends TestCase
{
    public function arrayProvider()
    {
        return
            [
                [
                    [
                        'class'           => 'customClass',
                        'href'            => 'href',
                        'hrefText'        => 'hrefText',
                        'dataWidgetId'    => '666',
                        'dataTheme'       => 'dataTheme',
                        'dataLinkColor'   => 'dataLinkColor',
                        'width'           => 666,
                        'height'          => 666,
                        'dataChrome'      => 'noheader nofooter noborders noscrollbar transparent',
                        'dataBorderColor' => 'dataBorderColor',
                        'language'        => 'language',
                        'dataTweetLimit'  => 666,
                        'dataRelated'     => 'dataRelated',
                        'dataAriaPolite'  => 'dataAriaPolite',
                    ]
                ]
            ];
    }
}
