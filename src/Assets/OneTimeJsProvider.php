<?php
/*
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace TwitterWidgets\Assets;

class OneTimeJsProvider
{
    /**
     * @return string
     *
     * Adds this before your </body> for performance instead of relying on getSingleWidgetJs() for each widget
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
